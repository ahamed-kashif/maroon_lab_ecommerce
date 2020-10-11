<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VariantType;
use Faker\Generator as Faker;

$factory->define(VariantType::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'unit' => $faker->name,
    ];
});
