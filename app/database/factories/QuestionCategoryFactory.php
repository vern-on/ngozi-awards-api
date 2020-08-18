<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\QuestionCategory;
use Faker\Generator as Faker;

$factory->define(QuestionCategory::class, function (Faker $faker) {
    $title = $faker->words(3, true);

    return [
        'title' => $faker->title,
        'slug' => \Str::slug($title),
    ];
});
