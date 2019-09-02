<?php

use Illuminate\Foundation\Inspiring;
use App\Console\Commands\UploadPersons;
use Illuminate\Http\Request;
use App\PersonClient;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


/**
 * ДЛЯ КЛИЕНТА
 * Для загрузки 100 пользователей (оптимизация) от указанной даты была добавлена команда:
 * php artisan upload:persons 2019-08-30
 * (загрузка пользователей в клиентсткую базу данных используя Публичное API)
 */
Artisan::command('upload:persons {date}', function ($date) {

    $this->info('Became to upload 100 Persons :-)');

    // $name = $this->ask('What is your name?');

    $up = new UploadPersons();
    $this->comment($up->handle($date));

    // $this->comment('Finished !!!');

})->describe('Upload 100 Persons from date (format: YYYY-MM-DD) from Public API in database (table \'persons_client\')');

/**
 * ДЛЯ КЛИЕНТА
 * Для загрузки ВСЕХ пользователей была добавлена команда:
 * php artisan upload:all-persons
 * (загрузка пользователей в клиентсткую базу данных используя Публичное API)
 */
Artisan::command('upload:all-persons', function() {
    $datetime = null;

    if (isset($datetime) && !is_null($datetime)) {
        // загружаем 100 пользователей от указанной даты
        $link_url = env('APP_URL') . '/api/persons' . (isset($offset) ? '?offset=' . $offset : '');
    } else {
        // загружаем всех пользователей
        $link_url = env('APP_URL') . '/api/all-persons';
    }

    $this->line('Uploading from URL:');
    $this->line($link_url);

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
        $this->error('cURL Error #:' . $err);
        exit;
    } else {

        // получаем данные в JSON
        $data = json_decode($response);

        // число загруженных пользователей
        $count_persons = 0;

        // обрабатываем данные
        if (isset($data->data) && !empty($data->data)) {

            $fromdb = count($data->data);
            $bar = $this->output->createProgressBar($fromdb);

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

                    $bar->advance();

                    // подсчитываем загружаемых пользователей
                    $count_persons++;
                }
            }

            //$bar->finish();
            echo "\r\n";
        }

        $this->info('Uploaded ' . $count_persons . ' persons');
    }

})->describe('Upload all Persons from Public API in database (table \'persons_client\')');
