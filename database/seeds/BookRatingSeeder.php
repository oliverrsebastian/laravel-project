<?php

use Illuminate\Database\Seeder;

class BookRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = [
            ["book_id" => 1, "user_id" => 1, "rating" => 3.0],
            ["book_id" => 2, "user_id" => 1, "rating" => 4.3],
            ["book_id" => 3, "user_id" => 1, "rating" => 4.5],
            ["book_id" => 4, "user_id" => 1, "rating" => 4.0]
        ];

        foreach ($ratings as $rating) {
            \Illuminate\Support\Facades\DB::table('book_rating')->insert($rating);
        }
    }
}
