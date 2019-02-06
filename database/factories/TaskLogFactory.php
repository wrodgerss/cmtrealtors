<?php

use Faker\Generator as Faker;

$factory->define(App\TaskLog::class, function (Faker $faker) {
    return [
        'job_description' => $faker->paragraph,
        'deadline' => date('Y-m-d', strtotime( '+' . random_int(1, 5) . ' weeks')),
    ];
});

$factory->afterMaking(App\TaskLog::class, function ($taskLog) {
    $taskLog->user_id = App\User::whereRole('team_member')->doesntHave('taskLogs')->inRandomOrder()->first()->id;
});
