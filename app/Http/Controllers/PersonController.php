<?php

namespace App\Http\Controllers;

use App\PersonClient;
use Illuminate\Support\Facades\Validator;
use App\Persons;
use Illuminate\Http\Request;

/**
 * ТЕСТОВОЕ ЗАДАНИЕ.
 *
 * Имеем: Сайт-сервер и Сайт-клиент построены на связке PHP и MySQL. На обоих сайтах хранится таблица пользователей.
 * Таблица содержит 4 поля:
 * Логин,
 * E-mail,
 * дата создания,
 * дата последнего обновления.
 *
 * Таблица содержит большое количество записей ( несколько тысяч).
 * На сайте-сервере каким-то внешним образом происходит изменение этой таблицы ( записи добавляются или изменяются).
 * Версии ПО: PHP 5.6+ , MySQL 5.1+ .
 *
 * Задача: в одностороннем порядке синхронизировать пользователей, с сервера на клиент. Для этого на сервере реализовать
 * на PHP публичный API для взаимодействия (публичный доступ к БД запрещён).
 * Должна быть возможность использовать данную синхронизацию через cron .
 *
 * Технические детали: можно писать на чистом PHP либо использовать общедоступные библиотеки, CMS или фреймворки.
 * Наличие разумных оптимизаций при обмене приветствуется.
 *
 * --------------------
 * ВЫПОЛНЕНИЕ.
 *
 * Так как и на предполагаемом САЙТЕ-СЕРВЕРЕ и на САЙТЕ-КЛИЕНТЕ может стоять Laravel, то
 * размещаю в одном месте (контроллере) и функции для СЕРВЕРА (которые делают Публичный API)
 * и функции для КЛИЕНТА (которые этим API пользуются) - озаглавив их в описании соответственно :)
 *
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * ДЛЯ СЕРВЕРА
     * Публичный API - отдает по 100 пользователей в формате JSON
     * (по url: 'http://tete/api/persons' или 'http://tete/api/persons?offset=2019-07-10'
     * (отсортировано по дате обновления)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPersons(GetPersonsRequest $request)
    {
        // обрабатываем данные
        // в GetPersonsRequest 
        /*$validator = Validator::make($request->all(), [
            'offset' => 'date_format:"Y-m-d"',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'info' => 'DEMO API по предоставлению пользователей (отсортировано по дате обновления) от 01/09/2019',
                'site' => 'http://makklays.com.ua',
                'error' => 'Параметр offset - не корректного формата (YYYY-mm-dd)',
            ], 404);
        }*/

        $offset = $request->get('offset');

        // отдаем по 100
        if (isset($offset) && !empty($offset)) {
            $persons = Persons::where('updated_at', '<', $offset)->orderBy('updated_at', 'DESC')->limit(100)->get();
        } else {
            $persons = Persons::orderBy('updated_at', 'DESC')->limit(100)->get();
        }

        return response()->json([
            'info' => 'DEMO API по предоставлению пользователей (отсортировано по дате обновления) от 01/09/2019',
            'site' => 'http://makklays.com.ua',
            'next_page' => [
                'path' => '/api/persons?offset=' . (isset($persons[99]->updated_at) ? date('Y-m-d', strtotime($persons[99]->updated_at)) : ''),
                'uri' => $request->server('REQUEST_SCHEME') . '://' . $request->server('HTTP_HOST') . '/api/persons?offset=' . (isset($persons[99]->updated_at) ? date('Y-m-d', strtotime($persons[99]->updated_at)) : ''),
                'offset' => (string) (isset($persons[99]->updated_at) ? date('Y-m-d', strtotime($persons[99]->updated_at)) : ''),
            ],
            'data' => $persons
        ], 200);
    }

    /**
     * ДЛЯ СЕРВЕРА
     * Публичный API - отдает всех пользователей
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPersons()
    {
        // --- произвольный json ---
        // return response()->json([
        //    'success' => true,
        //    'message' => 'string',
        //    'data' => Persons::all()
        // ]);

        return response()->json([
            'info' => 'DEMO API по предоставлению пользователей (отсортировано по дате обновления) от 01/09/2019',
            'data' => Persons::orderBy('updated_at', 'DESC')->get()
        ],200);
    }

    /**
     * ДЛЯ КЛИЕНТА
     * Функция для загрузки пользователей в клинтскую базу данных из ВЕБа
     * (по url /upload-persons от самых недавних или /upload-persons?offset=2019-07-10 от произвольной даты,
     * подгрузка по 100 пользователей - для оптимизации - следующая страница известна или от произвольной даты,
     * проверка на существование пользователя в клиентской базе данных имеется) - persons_client
     *
     * Что делает эта функция?
     * (Обращается по одному из url к серверу:
     * /api/persons
     * или
     * /api/persons?offset=2019-07-10
     * - получает данные и загружает пользователей в клиентскую базу данных.
     *
     * Если поставить в крон на запуск каждую минуту (после полной загрузки пользователей) - перенести код в .php файл
     * /1 * * * *  php  /upload_persons_from_api.php
     * то в клиентской базе данных всегда будут всежие и достоверные данные.
     */
    public function uploadPersons(Request $request)
    {
        // валидируем данные - offset (если имеются)
        $validator = Validator::make($request->all(), [
            'offset' => 'date_format:"Y-m-d"',
        ]);
        if ($validator->fails()) {
            echo 'ERROR: Параметр offset - некорректного формата (YYYY-mm-dd)';
            exit;
        }

        // получаем параметр offset
        $offset = $request->get('offset');

        // обращаемся к url
        $curl = curl_init();

        $link = $request->server('REQUEST_SCHEME') . '://' . $request->server('HTTP_HOST') . '/api/persons' . (isset($offset) ? '?offset='.$offset : '');

        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            exit;
        } else {

            // получаем данные в JSON
            $data = json_decode($response);

            // число загруженных пользователей
            $count_persons = 0;

            // обрабатываем данные
            if (isset($data->data) && !empty($data->data)) {
                foreach ($data->data as $person) {

                    // проверяем, есть ли такой пользователь уже в клиентской базе данных
                    $pr = PersonClient::where('email', $person->email)->first();

                    // если нет - добавляем в клиентскую базу данных
                    if (!isset($pr->email) || empty($pr->email)) {

                        $pc = new PersonClient();
                        $pc->login = $person->login;
                        $pc->email = $person->email;
                        $pc->created_at = $person->created_at;
                        $pc->updated_at = $person->updated_at;

                        $pc->save();

                        // подсчитываем загружаемых пользователей
                        $count_persons++;
                    }
                }
            }

            echo 'Uploaded ' . $count_persons . ' persons';
        }
    }
}
