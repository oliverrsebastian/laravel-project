<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['name' => "Darren C", 'dob' => "12/06/1998", 'country' => "China"],
            ['name' => "Jefri R", 'dob' => "13/04/1998", 'country' => "Australia"],
            ['name' => "Darez A", 'dob' => "05/03/1998", 'country' => "Chile"],
            ['name' => "Oliver S", 'dob' => "12/10/1997", 'country' => "New Zealand"]
        ];

        foreach ($authors as $author) {
            \Illuminate\Support\Facades\DB::table('authors')->insert($author);
        }
    }
}
