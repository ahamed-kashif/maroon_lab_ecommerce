<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->userName,
        'description' => $faker->paragraph(3),
        'short_code' => $faker->randomLetter
    ];
});
