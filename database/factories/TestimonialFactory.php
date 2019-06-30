<?php

use App\Models\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    $icons = [
        'icon-profile-male',
        'icon-profile-female',
    ];

    return [
        'enabled'   => rand(0, 1),
        'author'    => $faker->name,
        'content'   => $faker->paragraph($nbSentences = mt_rand(3, 6), $variableNbSentences = true),
        'icon'      => $icons[mt_rand(0, 1)],
    ];
});
