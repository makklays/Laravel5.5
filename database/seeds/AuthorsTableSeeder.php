<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->getOutput()->progressStart(2);

        // 1
        DB::table('authors')->insert([
            'id' => 1,
            'firstname' => 'Афтар',
            'lastname' => 'Жжет',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('authors')->insert([
            'id' => 2,
            'firstname' => 'ААААА',
            'lastname' => 'БББББ',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 3
        DB::table('authors')->insert([
            'id' => 3,
            'firstname' => 'Супер',
            'lastname' => 'Афтар',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 4
        DB::table('authors')->insert([
            'id' => 4,
            'firstname' => 'Имя1',
            'lastname' => 'Фамилия1',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 5
        DB::table('authors')->insert([
            'id' => 5,
            'firstname' => 'Имя2',
            'lastname' => 'Фамилия2',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 6
        DB::table('authors')->insert([
            'id' => 6,
            'firstname' => 'Имя3',
            'lastname' => 'Фамилия3',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 7
        DB::table('authors')->insert([
            'id' => 7,
            'firstname' => 'Имя4',
            'lastname' => 'Фамилия4',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 8
        DB::table('authors')->insert([
            'id' => 8,
            'firstname' => 'Имя6',
            'lastname' => 'Фамилия6',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 9
        DB::table('authors')->insert([
            'id' => 9,
            'firstname' => 'Имя7',
            'lastname' => 'Фамилия7',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 10
        DB::table('authors')->insert([
            'id' => 10,
            'firstname' => 'Имя8',
            'lastname' => 'Фамилия8',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 11
        DB::table('authors')->insert([
            'id' => 11,
            'firstname' => 'Имя01',
            'lastname' => 'Фамилия01',
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}