<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\TaskLog;
use App\Feedback;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::first()->taskLogs()->saveMany( factory(TaskLog::class, 5)->make() );
    }
}
