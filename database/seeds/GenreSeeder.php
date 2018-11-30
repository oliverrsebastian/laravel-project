<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => "Fiction"],
            ['name' => "Life"],
            ['name' => "Cartoon"],
            ['name' => "Mystery"],
            ['name' => "Comedy"]
        ];

        foreach ($genres as $genre) {
            \Illuminate\Support\Facades\DB::table('genres')->insert($genre);
        }
    }
}
