<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(500,10000),
        'in_stock' => 1,
        'is_active' => 1,
        'is_featured' => 0
    ];
});
