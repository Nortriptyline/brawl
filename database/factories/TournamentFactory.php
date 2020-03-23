<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Factory;
use App\Tournament;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'starting_date' => $faker->date('Y-m-d', '+5 months'),
        'starting_time' => $faker->time,
        'size' => $faker->randomElement(['8', '12', '16', '24', '32']),
        'team_size' => $faker->randomElement(['2', '3', '4', '6']),
        'genre' => $faker->randomElement(['male', 'female', 'mixed']),
        'field' => $faker->randomElement(['indoor', 'beach', 'grass', 'snow']),
        'creator' => $faker->numberBetween(1, 30),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
