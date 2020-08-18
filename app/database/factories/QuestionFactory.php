<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence(8, true) . '?';

    $categories = [
        'winners',
        'media',
        'scheduling',
        'data-protection',
        'adjudication',
    ];

    return [
        'title' => $title,
        'slug' => \Str::slug($title),
        'category' => $categories[array_rand($categories)],
        'content' => $faker->paragraph,
        'read_count' => rand(0, 1000),
    ];
});
