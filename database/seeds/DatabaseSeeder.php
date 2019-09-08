<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            NewsTableSeeder::class,
            PersonsTableSeeder::class,
            BooksTableSeeder::class,
            AuthorsTableSeeder::class,
            TTableSeeder::class,
        ]);
    }
}
