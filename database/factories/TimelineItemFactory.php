<?php

use App\Models\TimelineItem;
use App\Models\TimelineType;
use Faker\Generator as Faker;

$factory->define(TimelineItem::class, function (Faker $faker) {
    $timelineTypes = TimelineType::all();
    $timelineTypesCount = count($timelineTypes) - 1;

    $icons = [
        'fa-globe',
        'fa-building',
        'fa-chart-bar',
        'fa-chart-area',
    ];

    $iconsCount = count($icons) - 1;
    $type = $timelineTypes[mt_rand(0, $timelineTypesCount)];
    $text = '';

    // if ($type->slug != 'experience') {
    //     $text = $faker->paragraph($nbSentences = mt_rand(3, 6), $variableNbSentences = true);
    // }

    return [
        'enabled'       => rand(0, 1),
        'type_id'       => $type->id,
        'sort_order'    => $faker->unique()->numberBetween($min = 1, $max = 9000),
        'icon'          => $icons[mt_rand(0, $iconsCount)],
        'dates'         => $faker->unique()->year($max = 'now'),
        'title'         => $faker->unique()->words($nb = 2, $asText = true),
        'subtitle'      => $faker->words($nb = 4, $asText = true),
        'text'          => $text,
    ];
});
