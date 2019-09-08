<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TTableSeeder extends Seeder
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
        DB::table('t_table')->insert([
            'name' => 'Victoria',
            'price' => 374662,
            'bedrooms' => 4,
            'storeys' => 2,
            'bathrooms' => 2,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('t_table')->insert([
            'name' => 'Xavier',
            'price' => 513268,
            'bedrooms' => 4,
            'storeys' => 2,
            'bathrooms' => 1,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 3
        DB::table('t_table')->insert([
            'name' => 'Como',
            'price' => 454990,
            'bedrooms' => 4,
            'storeys' => 3,
            'bathrooms' => 2,
            'garages' => 3,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 4
        DB::table('t_table')->insert([
            'name' => 'Aspen',
            'price' => 384356,
            'bedrooms' => 4,
            'storeys' => 2,
            'bathrooms' => 2,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 5
        DB::table('t_table')->insert([
            'name' => 'Lucretia',
            'price' => 572002,
            'bedrooms' => 4,
            'storeys' => 3,
            'bathrooms' => 2,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 6
        DB::table('t_table')->insert([
            'name' => 'Toorak',
            'price' => 521951,
            'bedrooms' => 5,
            'storeys' => 2,
            'bathrooms' => 1,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 7
        DB::table('t_table')->insert([
            'name' => 'Skyscape',
            'price' => 263604,
            'bedrooms' => 3,
            'storeys' => 2,
            'bathrooms' => 2,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 8
        DB::table('t_table')->insert([
            'name' => 'Clifton',
            'price' => 386103,
            'bedrooms' => 3,
            'storeys' => 2,
            'bathrooms' => 1,
            'garages' => 1,
        ]);
        $this->command->getOutput()->progressAdvance();

        // 9
        DB::table('t_table')->insert([
            'name' => 'Geneva',
            'price' => 390600,
            'bedrooms' => 4,
            'storeys' => 3,
            'bathrooms' => 2,
            'garages' => 2,
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}
