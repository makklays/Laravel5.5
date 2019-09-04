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
            'firstname' => 'Афтор',
            'lastname' => 'Жжет',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('authors')->insert([
            'id' => 2,
            'firstname' => 'Афтааар',
            'lastname' => 'Нежжет',
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
            'firstname' => 'Гдеты',
            'lastname' => 'Афтоff',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 5
        DB::table('authors')->insert([
            'id' => 5,
            'firstname' => 'Гдетыwe',
            'lastname' => 'Афтоff',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 6
        DB::table('authors')->insert([
            'id' => 6,
            'firstname' => 'Гдer4tеты',
            'lastname' => 'Афdfтоff',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 7
        DB::table('authors')->insert([
            'id' => 7,
            'firstname' => 'Гдwghjer4tеты',
            'lastname' => 'Афdfтоghjgff',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 8
        DB::table('authors')->insert([
            'id' => 8,
            'firstname' => 'Гдeeee',
            'lastname' => 'Афwwwww',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 9
        DB::table('authors')->insert([
            'id' => 9,
            'firstname' => 'Гдeeeaaaae',
            'lastname' => 'Афwaaaaaawwww',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 10
        DB::table('authors')->insert([
            'id' => 10,
            'firstname' => 'KJgiuerf',
            'lastname' => 'OUIOYFC',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 11
        DB::table('authors')->insert([
            'id' => 10,
            'firstname' => 'Oghotpymtas',
            'lastname' => 'Tsdflwoerfnw',
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}