<?php

use App\Models\PortfolioItem;
use Faker\Generator as Faker;

$factory->define(PortfolioItem::class, function (Faker $faker) {
    $imagesSmall = [
        'https://picsum.photos/500/500/?random',
        'https://source.unsplash.com/random/500x500',
        'https://loremflickr.com/500/500',
        'https://baconmockup.com/500/500',
    ];

    $imagesLarge = [
        'https://picsum.photos/1600/900/?random',
        'https://source.unsplash.com/random/1600x900',
        'https://loremflickr.com/1600/900',
        'https://baconmockup.com/1600/900',
    ];

    $title = $faker->unique()->sentence(mt_rand(1, 2));
    $sortOrder = PortfolioItem::all();

    return [
        'slug'                  => strtolower(str_replace(' ', '-', $title)),
        'title'                 => $title,
        'subtitle'              => str_limit($faker->sentence(mt_rand(10, 20)), 252),
        'content_raw'           => implode("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'content_html'          => $faker->randomHtml(2, 3),
        'item_image'            => $imagesSmall[mt_rand(0, 3)],
        'item_image_large'      => $imagesLarge[mt_rand(0, 3)],
        'project_link_enabled'  => rand(0, 1),
        'project_link'          => $faker->unique()->url(),
        'meta_description'      => "Meta for $title",
        'enabled'               => rand(0, 1),
        'sort_order'            => $sortOrder->count() + 1,
    ];
});
