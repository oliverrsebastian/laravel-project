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
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BooksRatingTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
    }
}
