<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', [
    'role' => 'admin',
]);

$factory->state(App\User::class, 'project_manager', [
    'role' => 'project_manager',
]);

$factory->state(App\User::class, 'team_member', [
    'role' => 'team_member',
]);

$factory->afterCreatingState(App\User::class, 'project_manager', function ($user, $faker) {
    $user->tasks()->saveMany(factory(App\Task::class, 2)->make());
});
