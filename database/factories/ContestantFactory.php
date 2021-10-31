<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Contestant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Contestant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'win' => $faker->randomNumber($nbDigits = 2),
        'lost' => $faker->randomNumber($nbDigits = 2),
    ];
});
