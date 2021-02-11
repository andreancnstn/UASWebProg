<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 3),
        'category_id' => $faker->numberBetween($min = 1, $max = 4),
        'title' => $faker->city.', '.$faker->state,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'image' => 'images/mountain.jpg'
    ];
});
