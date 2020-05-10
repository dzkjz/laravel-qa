<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5, 10)), "."),
        'body' => $faker->paragraphs(rand(4, 8), true),
        'views' => $faker->numberBetween(0, 10),
        'answers' => $faker->numberBetween(0, 10),
        'votes' => $faker->numberBetween(-10, 10),
    ];
});
