<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Variant;
use Faker\Generator as Faker;

$factory->define(Variant::class, function (Faker $faker) {
    return [
        'value' => $faker->userName,
        'variant_type_id' => 1,
        //'short_code' => $faker->streetSuffix,
        //'category_id' => 2
    ];
});
