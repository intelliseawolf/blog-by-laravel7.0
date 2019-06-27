<?php

use App\Models\PortfolioItemTechTag;
use Faker\Generator as Faker;

$factory->define(PortfolioItemTechTag::class, function (Faker $faker) {
    $word = $faker->unique()->word;

    return [
        'tag'               => $word,
        'title'             => ucfirst($word)
    ];
});
