<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class)->create([
          'page_key' => 'page_cart',
          'guest' => 0,
          'member' => 0,
          'admin' => 1
        ]);
        factory(Page::class)->create([
          'page_key' => 'page_home',
          'guest' => 1,
          'member' => 1,
          'admin' => 1
        ]);
    }
}
