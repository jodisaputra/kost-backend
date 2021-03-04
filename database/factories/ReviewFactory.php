<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\User;
use App\Models\BoardingHouse;

use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'boarding_id' => BoardingHouse::all()->random()->id,
        'rate' => $faker->randomElement(['1', '2', '3', '4', '5']),
        'comment' => $faker->sentence(6),
        'created_by' => User::all()->random()->id
    ];
});
