<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'title' => $faker->city,
        'location' => $faker->address,
        'description' => $faker->paragraph,
    ];
});
