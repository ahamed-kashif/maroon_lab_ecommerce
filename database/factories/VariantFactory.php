<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Variant;
use Faker\Generator as Faker;

$factory->define(Variant::class, function (Faker $faker) {
    return [
        'value' => $faker->userName,
        'type' => $faker->jobTitle,
        'unit' => $faker->randomLetter
    ];
});
