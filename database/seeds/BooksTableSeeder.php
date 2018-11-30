<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class)->create([
        	'name' => 'Hansel and Gretel',
        	'genre' => 'fiction',
        	'author' => 'Engelbert Humperdinck',
        	'price' => 150000,
        	'description' => 'Hansel and Gretel" is a well-known fairy tale of German origin, recorded by the Brothers Grimm and published in 1812.',
        	'stock' => 3,
        	'image' => 'hansel_and_gretel.jpg',
        	'rating' => 4.5
        ]);

        factory(Book::class)->create([
        	'name' => 'Kane and Abel',
        	'genre' => 'fiction',
        	'author' => 'Jeffrey Archer',
        	'price' => 250000,
        	'description' => 'Kane and Abel is a 1979 novel by British author Jeffrey Archer. Released in the United Kingdom in 1979 and in the United Statesinternational success.',
        	'stock' => 1,
        	'image' => 'kane_and_abel.jpg',
        	'rating' => 4.39
        ]);

        factory(Book::class)->create([
        	'name' => 'The Mighty Krait',
        	'genre' => 'history',
        	'author' => 'Ian McPhedran',
        	'price' => 37500,
        	'description' => 'The little boat with a big past: the fight to save one of the most important artefacts of Australian military history. ',
        	'stock' => 9,
        	'image' => 'the_mighty_krait.jpg',
        	'rating' => 3.24
        ]);

        factory(Book::class)->create([
            "name" => "Fajar Matahari",
            "genre" => "Fiction",
            "author" => "Darren C",
            "price" => 100000,
            "description" => "Menunggu fajar matahri",
            "stock" => 5,
            "image" => "null",
            "rating" => 3.89
        ]);


        factory(Book::class)->create([
            "name" => "Biji Bunga Matahari",
            "genre" => "Life",
            "author" => "Jefri R",
            "price" => 200000,
            "stock" => 2,
            "description" => "Mendalami bunga matahari",
            "image" => "null",
            "rating" => 2.73
        ]);

        factory(Book::class)->create([
            "name" => "Wulan",
            "genre" => "Cartoon",
            "author" => "Darez A",
            "price" => 50000,
            "stock" => 10,
            "description" => "Seorang wanita menyamar sebagai pria",
            "image" => "null",
            "rating" => 1.67
        ]);

        factory(Book::class)->create([
            "name" => "Ghostbuster Volume 2",
            "genre" => "Mystery",
            "author" => "Jefri R",
            "price" => 20000,
            "stock" => 3,
            "description" => "Menangkap hantu yang kesepian",
            "image" => "null",
            "rating" => 2.67
        ]);
        
    }
}
