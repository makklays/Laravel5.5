<?php
namespace App\Modules\Bitcoin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Bitcoin\models\Bitcoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BitcoinController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Получить все данные
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'info' => 'Данные для разных обменных площадок. Url для получения данных',
            'data' => Bitcoin::get(),
        ], 200);
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
            'success' => 'Данные успешно добавлены',
            'id' => $bi->id,
            'title' => $bi->title,
            'datetime' => $bi->created_at,
        ], 200);
    }
}