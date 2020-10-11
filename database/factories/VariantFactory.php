<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Variant;
use Faker\Generator as Faker;

$factory->define(Variant::class, function (Faker $faker) {
    return [
        'title' => $faker->userName,
        'code' => $faker->streetSuffix,
        //'short_code' => $faker->streetSuffix,
        //'category_id' => 2
    ];
});
