<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Genre::class)->create([
        	'name' => 'fiction'
        ]);

        factory(Genre::class)->create([
        	'name' => 'history'
        ]);

        factory(Genre::class)->create([
        	'name' => 'fantasy'
        ]);

        factory(Genre::class)->create([
        	'name' => 'mystery'
        ]);

        factory(Genre::class)->create([
        	'name' => 'novel'
        ]);

        factory(Genre::class)->create([
        	'name' => 'drama'
        ]);

        factory(Genre::class)->create([
        	'name' => 'life'
        ]);
        
        factory(Genre::class)->create([
        	'name' => 'cartoon'
        ]);

        factory(Genre::class)->create([
        	'name' => 'comedy'
        ]);
    }
}
