<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\BoardingHouse;
use Faker\Generator as Faker;

$factory->define(BoardingHouse::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'name' => $faker->streetName,
        'address' => $faker->streetAddress,
        'map_url' => $faker->randomElement(['https://goo.gl/maps/otjzkzMXktvLJNPh9', 'https://goo.gl/maps/bTXJqUTxuXeF2i1o9', 'https://goo.gl/maps/H6a2aZ8V2QFwGNNe7', 'https://goo.gl/maps/bCuNPVnxrUPHELf28', 'https://goo.gl/maps/6t5pVfeHrn1CN5gb8']),
        'city' => 'Batam'
    ];
});
