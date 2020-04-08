<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tsetting;
use Faker\Generator as Faker;

$factory->define(Tsetting::class, function (Faker $faker) {
    return [
        'size' => $faker->randomElement(['8', '12', '16', '24', '32']),
        'team_size' => $faker->randomElement(['2', '3', '4', '6']),
        'genre' => $faker->randomElement(['male', 'female', 'mixed']),
        'field' => $faker->randomElement(['indoor', 'beach', 'grass', 'snow']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
