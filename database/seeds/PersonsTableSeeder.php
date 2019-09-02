<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Create Persons of accounts.
     *
     * @return void
     */
    public function run()
    {
        $item = 2500;
        $this->command->getOutput()->progressStart($item);

        $min_datetime = 1467364000;
        $max_datetime = 1567364000; // 01.09.2019 20:53:00 in UNIX_TIMESTAMP

        for($i = 1; $i < $item; $i++) {
            DB::table('persons')->insert([
                'login' => str_random(5).rand(100000, 888888).str_random(5),
                'email' => str_random(5).rand(10, 88).'@mail.ru',
                'created_at' => date('Y-m-d H:i:s', rand($min_datetime, $max_datetime)),
                'updated_at' => date('Y-m-d H:i:s', rand($min_datetime, $max_datetime)),
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
