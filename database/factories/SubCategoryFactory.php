<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->userName,
        'description' => $faker->paragraph,
        'short_code' => $faker->streetSuffix,
        'category_id' => 2
    ];
});
