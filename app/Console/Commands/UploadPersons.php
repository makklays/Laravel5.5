<?php

namespace App\Console\Commands;

use App\Repository\UploadPersonsRepository;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\PersonClient;

class UploadPersons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:persons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload all persons from Public API in databases (table persons_client)';

    /**
     * The Upload Persons service.
     * @var UploadPersonsRepository
     */
    //protected $upload;

    /**
     * Create a new command instance.
     *
     * UploadPersons constructor.
     * @param UploadPersonsRepository $upload
     */
    public function __construct() // UploadPersonsRepository $upload
    {
        parent::__construct();

        //$this->upload = $upload;
    }

    /**
     * Execute the console command.
     */
    public function handle($date)
    {
        // $datetime = $this->argument('date');

        if (isset($date) && !empty($date)) {
            // загружаем 100 пользователей от указанной даты
            $link_url = env('APP_URL') . '/api/persons' . (isset($date) ? '?offset=' . $date : '');
        } else {
            // загружаем всех пользователей
            $link_url = env('APP_URL') . '/api/all-persons';
        }

        echo 'Uploading from URL:' . "\r\n";
        echo $link_url . "\r\n";

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
            echo "cURL Error #:" . $err . "\r\n";
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

            echo 'Uploaded ' . $count_persons . ' persons.';
        }
    }
}
