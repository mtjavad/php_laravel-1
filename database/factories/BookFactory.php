<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'pages' => $faker->randomNumber(3),
        'price' => $faker->randomNumber(4),
        'ISBN' => Str::random(10),
        'published_at'=> $faker->date('Y-m-d')
    ];
});
