<?php

use Illuminate\Database\Seeder;
use App\BookRating;

class BooksRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(BookRating::class)->create([
          'book_id' => 1, 
          'user_id' => 1, 
        	'rating' => 4
        ]);

        factory(BookRating::class)->create([
          'book_id' => 2, 
          'user_id' => 1, 
        	'rating' => 4
        ]);

        factory(BookRating::class)->create([
          'book_id' => 3, 
          'user_id' => 1, 
        	'rating' => 3
        ]);

        factory(BookRating::class)->create([
          'book_id' => 4, 
          'user_id' => 1, 
          'rating' => 3
        ]);
        
        factory(BookRating::class)->create([
          'book_id' => 5, 
          'user_id' => 1, 
          'rating' => 2
        ]);

        factory(BookRating::class)->create([
          'book_id' => 6, 
          'user_id' => 1, 
          'rating' => 1
        ]);
        
        factory(BookRating::class)->create([
          'book_id' => 7, 
          'user_id' => 1, 
          'rating' => 2
        ]);

    }
}
