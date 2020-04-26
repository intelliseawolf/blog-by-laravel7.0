<?php

use App\Models\PortfolioItemTag;
use Faker\Generator as Faker;

$factory->define(PortfolioItemTag::class, function (Faker $faker) {
    $word = $faker->unique()->word;

    return [
        'tag'               => $word,
        'title'             => ucfirst($word),
    ];
});
