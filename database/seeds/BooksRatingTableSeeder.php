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
        factory(Author::class)->create([
          'book_id' => 1, 
          'user_id' => 1, 
          'rating' => 3.0
        ]);
        
        factory(Author::class)->create([
          'book_id' => 2, 
          'user_id' => 1, 
          'rating' => 4.3
        ]);

        factory(Author::class)->create([
          'book_id' => 3, 
          'user_id' => 1, 
          'rating' => 4.5
        ]);
        
        factory(Author::class)->create([
          'book_id' => 4, 
          'user_id' => 1, 
          'rating' => 4.0
        ]);
        
    }
}
