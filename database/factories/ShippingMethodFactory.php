<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShippingMethod;
use Faker\Generator as Faker;

$factory->define(ShippingMethod::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'phone_number' => $faker->randomDigit,
        'short_code' => $faker->uuid,
    ];
});
