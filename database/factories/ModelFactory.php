<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => str_random(10),
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\Post::class, function ($faker) {
  $images = ['backgrounds/about-bg.jpg', 'backgrounds/contact-bg.jpg', 'backgrounds/home-bg.jpg', 'backgrounds/post-bg.jpg'];
  $title = $faker->sentence(mt_rand(3, 10));
  return [
    'title' => $title,
    'subtitle' => str_limit($faker->sentence(mt_rand(10, 20)), 252),
    'page_image' => $images[mt_rand(0, 3)],
    'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    'meta_description' => "Meta for $title",
    'is_draft' => false,
  ];
});

$factory->define(App\Tag::class, function ($faker) {
  $images = ['backgrounds/about-bg.jpg', 'backgrounds/contact-bg.jpg', 'backgrounds/home-bg.jpg', 'backgrounds/post-bg.jpg'];
  $word = $faker->word;
  return [
    'tag' => $word,
    'title' => ucfirst($word),
    'subtitle' => $faker->sentence,
    'page_image' => $images[mt_rand(0, 3)],
    'meta_description' => "Meta for $word",
    'reverse_direction' => false,
];
});