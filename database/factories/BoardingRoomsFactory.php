<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BoardingRoom;
use Faker\Generator as Faker;

$factory->define(BoardingRoom::class, function (Faker $faker) {

    return [
        'name' => $faker->randomElement(['room 1', 'room 2', 'room 3', 'room 4', 'room 5', 'exclusive 1', 'exclusive 2']),
        'status' => $faker->randomElement(['available', 'not_available']),
        'price' => $faker->numberBetween($min = 500000, $max = 2000000)
    ];
});
