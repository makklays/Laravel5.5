<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
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
        DB::table('books')->insert([
            'id' => 1,
            'user_id' => 1,
            'author_id' => 1,
            'title' => 'Мужчины с Марса, женщины с Венеры',
            'count_page' => '350',
            'annotation' => '101 способ о том как стать ближе.',
            //'picture' => '',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('books')->insert([
            'id' => 2,
            'user_id' => 1,
            'author_id' => 2,
            'title' => 'КорзинНа с ручками',
            'count_page' => '2000',
            'annotation' => 'Так себе)',
            //'picture' => '',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 3
        DB::table('books')->insert([
            'id' => 3,
            'user_id' => 2,
            'author_id' => 3,
            'title' => 'Как я поимел Слово начинающееся с большой буквы',
            'count_page' => '3',
            'annotation' => 'Так себе 1 ) Лозумг: Делай себе!',
            'picture' => '/img/book_1.png',
        ]);
        $this->command->getOutput()->progressAdvance();

        // 4
        DB::table('books')->insert([
            'id' => 4,
            'user_id' => 3,
            'author_id' => 4,
            'title' => 'Как я поимел Слово начинающееся с большой буквы',
            'count_page' => '3',
            'annotation' => 'Так себе 2) Лозумг: Делай себе!',
            'picture' => '/img/book_2.png',
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}