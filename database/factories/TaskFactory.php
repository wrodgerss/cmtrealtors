<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'status' => 'ongoing',
        'deadline' => now()->addMonth()
    ];
});

$factory->afterMaking(App\Task::class, function ($task) {
    $task->property_id = App\Property::doesntHave('tasks')->inRandomOrder()->first()->id;
});
