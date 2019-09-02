<?php

namespace App\Repository;

use App\PersonClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class UploadPersonsRepository
{
    public function execute($datetime = null, Request $request)
    {
        if (isset($datetime) && !is_null($datetime)) {
            // загружаем 100 пользователей от указанной даты
            $link_url = $request->server('REQUEST_SCHEME') . '://' . $request->server('HTTP_HOST') . '/api/persons' . (isset($offset) ? '?offset=' . $offset : '');
        } else {
            // загружаем всех пользователей
            $link_url = $request->server('REQUEST_SCHEME') . '://' . $request->server('HTTP_HOST') . '/api/all-persons';
        }

        // обращаемся к url
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $link_url,
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