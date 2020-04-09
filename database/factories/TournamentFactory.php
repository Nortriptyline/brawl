<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Factory;
use App\Tournament;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'city_id' => $faker->numberBetween(1, 35853),
        'address' => $faker->streetAddress(),
        'starting_date' => $faker->date('Y-m-d', '+5 months'),
        'starting_time' => $faker->time,
        'creator' => $faker->numberBetween(1, 30),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
