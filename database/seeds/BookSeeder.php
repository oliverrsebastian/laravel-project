<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $books = [
            ["name" => "Fajar Matahari",
                "genre" => "Fiction",
                "author" => "Darren C",
                "price" => 100000,
                "stock" => 5,
                "description" => "Menunggu fajar matahri",
                "image" => "null"
            ],
            ["name" => "Biji Bunga Matahari",
                "genre" => "Life",
                "author" => "Jefri R",
                "price" => 200000,
                "stock" => 2,
                "description" => "Mendalami bunga matahari",
                "image" => "null"
            ],
            ["name" => "Wulan",
                "genre" => "Cartoon",
                "author" => "Darez A",
                "price" => 50000,
                "stock" => 10,
                "description" => "Seorang wanita menyamar sebagai pria",
                "image" => "null"
            ],
            ["name" => "Ghostbuster Volume 2",
                "genre" => "Mystery",
                "author" => "Jefri R",
                "price" => 20000,
                "stock" => 3,
                "description" => "Menangkap hantu yang kesepian",
                "image" => "null"
            ],
        ];

        foreach ($books as $book) {
            \Illuminate\Support\Facades\DB::table('books')->insert($book);
        }
    }
}
