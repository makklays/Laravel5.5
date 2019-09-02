<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
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
        DB::table('news')->insert([
            'id' => 1,
            'title' => 'News1',
            'slug' => '1-news1',
            'short_description' => 'short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. 
            
            short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => date('Y-m-d H:i:s', time()),
            'created_at' => '2019-08-30 00:00:01',
            'updated_at' => '2019-08-30 00:00:01',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('news')->insert([
            'id' => 2,
            'title' => 'Какая-то Новость 2',
            'slug' => '2-kakaya-to-novost-2',
            'short_description' => 'short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-20 00:00:00',
            'created_at' => '2019-08-20 00:00:00',
            'updated_at' => '2019-08-20 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 3
        DB::table('news')->insert([
            'id' => 3,
            'title' => 'Какая-то Новость 33',
            'slug' => '3-kakaya-to-novost-33',
            'short_description' => 'short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. 
            
            short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-22 00:00:00',
            'created_at' => '2019-08-22 00:00:00',
            'updated_at' => '2019-08-22 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 4
        DB::table('news')->insert([
            'id' => 4,
            'title' => 'Какая-то Новость 4',
            'slug' => '4-kakaya-to-novost-4',
            'short_description' => 'short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. 
            
            short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full  4444 444 4 description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-21 00:00:00',
            'created_at' => '2019-08-21 00:00:00',
            'updated_at' => '2019-08-21 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 5
        DB::table('news')->insert([
            'id' => 5,
            'title' => 'Какая-то Новость 5',
            'slug' => '5-kakaya-to-novost-5',
            'short_description' => 'short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full  4444 444 4 description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-27 00:00:00',
            'created_at' => '2019-08-27 00:00:00',
            'updated_at' => '2019-08-27 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 6
        DB::table('news')->insert([
            'id' => 6,
            'title' => 'Какая-то Новость 6',
            'slug' => '6-kakaya-to-novost-6',
            'short_description' => 'short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. 
            short description. Short Description. short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full  4444 444 4 description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-25 00:00:00',
            'created_at' => '2019-08-25 00:00:00',
            'updated_at' => '2019-08-25 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 7
        DB::table('news')->insert([
            'id' => 7,
            'title' => 'Какая-то Новость 7',
            'slug' => '7-kakaya-to-novost-7',
            'short_description' => 'short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. 
            
            short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full  4444 444 4 description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => '2019-08-28 00:00:00',
            'created_at' => '2019-08-28 00:00:00',
            'updated_at' => '2019-08-28 00:00:00',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 8
        DB::table('news')->insert([
            'id' => 8,
            'title' => 'Какая-то Новость 8',
            'slug' => '8-kakaya-to-novost-8',
            'short_description' => 'short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. short description. Short Description. 
            
            short description. Short Description. ',
            'full_description' => 'Full description. full description. Full description. full description. Full 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full  4444 444 4 description. Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. 
            
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. 
            Full description. full description. Full description. full description. Full description. full description. 
            Full description. full description. ',
            'publicated_at' => date('Y-m-d H:i:s', time()),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}
