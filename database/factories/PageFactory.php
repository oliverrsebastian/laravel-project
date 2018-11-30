<?php

use Faker\Generator as Faker;
use App\Page;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'page_key' => $faker->name,
        'guest' => $faker->numberBetween(0, 1),
        'member' => $faker->numberBetween(0, 1), // secret
        'admin' => $faker->numberBetween(0, 1),
    ];
});
