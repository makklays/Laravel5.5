<?php
namespace App\Modules\Bitcoin\Controllers;

use App\Modules\Bitcoin\exports\BitcoinExport;
use Exception;
use App\Http\Controllers\Controller;
use App\Modules\Bitcoin\models\Bitcoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\XMLWriter;

class BitcoinController extends Controller
{
    /**
     * BitcoinController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('Bitcoin::bitcoin.index');
    }

    /**
     * Получить все данные
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDataJson(Request $request)
    {
        // валидация - по названию (часть слова)
        if (isset($request->name)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|alpha_dash|max:255',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
                    'error' => 'ОШИПКА!) Ошибка валидации данных параметра - name',
                ], 404);
            }
        }

        // валидация - по дате
        if (isset($request->date)) {
            $validate = Validator::make($request->all(), [
                'date' => 'required|date_format:"Y-m-d"',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
                    'error' => 'ОШИПКА!) Ошибка валидации данных параметра - date',
                ], 404);
            }
        }

        $data = Bitcoin::select([
            'bitcoins.title', 'bitcoins.price', 'bitcoins.price_2', 'bitcoins.fee_in_per',
            'bitcoins.limits', 'bitcoins.limit_min' ])
            ->search($request)->orderBy('created_at', 'DESC')->get();

        if (isset($data) && !empty($data)) {
            foreach ($data as $itm) {
                // названия валют
                $name = explode('-', $itm->title);

                // отнимаем процент комиссии
                $price = ($itm->price - ($itm->price * $itm->fee_in_per / 100));
                // округляем в меньшую сторону 8 знаков после запятой
                $new_price = round($price, 8, PHP_ROUND_HALF_DOWN);

                /*if ($new_price > 0 && $new_price < 1) {
                    $price_out = round(1 / $new_price, 8, PHP_ROUND_HALF_DOWN);
                    $new_price = 1;
                }*/

                $from[$name[0]]['to'][$name[1]] = [
                    // сколько отдаем
                    'in' => 1,
                    // по правилам площадки округляем до 6 знаков после запятой
                    // сколько получаем
                    'out' => round($new_price, 6, PHP_ROUND_HALF_DOWN),

                    // не отображаем комиссию
                    //'fee_in_per' => $itm->fee_in_per,

                    // минимальная сумма обмена
                    'in_min_amount' => round($itm->limit_min, 6, PHP_ROUND_HALF_DOWN),
                ];
            }
        }
        if (isset($from) && !empty($from)) {
            $arr_data['from'] = $from;

            // identity - обмен возможен только после прохождения процедуры идентификации (верификации);
            // auth - обмен возможен только после авторизации (регистрации) на сайте.
            $arr_data['options'] = ["auth", "identity"];
        } else {
            $arr_data = [
                'info' => 'Данные c курсами валют.',
                'error' => 'ОШИПКА!) Ошибка при загрузке данных на сервисе.',
            ];
        }

        return response($arr_data, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Добавить данные - обмена валют
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request)
    {
        // little validate
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'fees' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
                'error' => 'ОШИПКА!) Ошибка при добавлении данных в поле: title, price, fees',
            ], 404);
        }

        // добавление курса обмена валюты
        $bi = new Bitcoin();
        //$bi->load($request);
        $bi->title = $request->get('title');

        $price = $request->get('price');
        if (isset($price) && !empty($price)) {
            $price = round($price, 8, PHP_ROUND_HALF_DOWN);
            $bi->price = $price;
        }

        $price_2 = $request->get('price_2');
        if (isset($price_2) && !empty($price_2)) {
            $price_2 = round($price_2, 8, PHP_ROUND_HALF_DOWN);
            $bi->price_2 = $price_2;
        }

        $fees = $request->get('fees');
        if (isset($fees) && !empty($fees)) {
            $bi->fees = $fees;
        }

        $limits = $request->get('limits');
        if (isset($limits) && !empty($limits)) {
            $bi->limits = $limits;
        }
        $bi->created_at = date('Y-m-d H:i:s', time());

        $bi->save();

        return response()->json([
            'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
            'success' => 'Данные успешно добавлены!',
            'id' => $bi->id,
            'title' => $bi->title,
            'datetime' => $bi->created_at,
        ], 200);
    }

    public function getDataXML(Request $request)
    {
        // валидация - по названию (часть слова)
        if (isset($request->name)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|alpha_dash|max:255',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
                    'error' => 'ОШИПКА!) Ошибка валидации данных параметра - name',
                ], 404);
            }
        }

        // валидация - по дате
        if (isset($request->date)) {
            $validate = Validator::make($request->all(), [
                'date' => 'required|date_format:"Y-m-d"',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'info' => 'Данные для разных обменных площадок. Url для добавления данных.',
                    'error' => 'ОШИПКА!) Ошибка валидации данных параметра - date',
                ], 404);
            }
        }

        $datas = Bitcoin::select([
            'bitcoins.title', 'bitcoins.price', 'bitcoins.price_2', 'bitcoins.fee_in_per',
            'bitcoins.limits', 'bitcoins.limit_min' ])
            ->search($request)->orderBy('created_at', 'DESC')->get();

        try {

            foreach ($datas as $k => $itm) {
                $name = explode('-', $itm->title);

                // отнимаем процент комиссии
                $price = ($itm->price - ($itm->price * $itm->fee_in_per / 100));
                // округляем в меньшую сторону 8 знаков после запятой
                $new_price = round($price, 8, PHP_ROUND_HALF_DOWN);

                $from[$name[0]]['to'][$name[1]] = [
                    // сколько отдаем
                    'in' => 1,
                    // по правилам площадки округляем до 6 знаков после запятой
                    // сколько получаем
                    'out' => round($new_price,6,PHP_ROUND_HALF_DOWN),

                    // минимальная сумма обмена
                    'in_min_amount' => round($itm->limit_min,6,PHP_ROUND_HALF_DOWN),
                ];
            }

            $xml = new XMLWriter();
            //$xml->openUri('documents/xmls/bitcoin_'.date('d_m_Y').'.xml');
            $xml->openUri('file_'.date('d_m_Y').'.xml');
            $xml->startDocument('1.0');
            $xml->startElement('from');

            foreach ($from as $name_from => $to) {
                $xml->startElement($name_from);
                foreach($to as $too) {
                    $xml->startElement('to');
                    foreach ($too as $name_to => $item_elems) {

                        //dd($item_elems);

                        $xml->startElement($name_to);
                        //foreach ($item_elems as $itm) {
                            $xml->writeElement('in', $item_elems['in']);
                            $xml->writeElement('out', (float) $item_elems['out']);
                            $xml->writeElement('in_min_amount', $item_elems['in_min_amount']);
                            //$xml->writeElement('datetime', $itm->created_at);
                        //}
                        $xml->endElement();
                    }
                    $xml->endElement();
                }
                $xml->endElement();
            }

            $xml->endElement();
            $xml->endDocument();
            $xml->flush();

        } catch (Exception $e) {
            echo 'ERROR! Exception: '.$e->getMessage(). ' File: '.$e->getFile() . 'Line: '.$e->getLine();
        }

        //return response()->download($xml);
        return response(file_get_contents('file_'.date('d_m_Y').'.xml'), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function getDataExcel(Request $request)
    {
        // валидация - по названию (часть слова)
        if (isset($request->name)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|alpha_dash|max:255',
            ]);
            if ($validate->fails()) {
                return view('/currency/'); // add ->with()
            }
        }

        // валидация - по дате
        if (isset($request->date)) {
            $validate = Validator::make($request->all(), [
                'date' => 'required|date_format:"Y-m-d"',
            ]);
            if ($validate->fails()) {
                return view('/currency/'); // add ->with()
            }
        }

        return Excel::download(new BitcoinExport($request), 'exchange-bitcoin.xlsx');
    }

    public function getDataCSV(Request $request)
    {
        // если есть переменная 'name' - валидация - по названию (часть слова)
        if (isset($request->name)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|alpha_dash|max:255',
            ]);
            if ($validate->fails()) {
                return view('/currency/'); // add ->with()
            }
        }

        // если есть переменная 'date' - валидация - по дате
        if (isset($request->date)) {
            $validate = Validator::make($request->all(), [
                'date' => 'required|date_format:"Y-m-d"',
            ]);
            if ($validate->fails()) {
                return view('/currency/'); // add ->with()
            }
        }

        return Excel::download(new BitcoinExport($request), 'exchange-bitcoin.csv');
    }
}