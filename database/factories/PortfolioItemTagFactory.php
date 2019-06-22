<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PortfolioItemTag::class, function (Faker $faker) {
    $word = $faker->unique()->word;

    return [
        'tag'               => $word,
        'title'             => ucfirst($word)
    ];
});
