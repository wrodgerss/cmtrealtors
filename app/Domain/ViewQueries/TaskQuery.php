<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 7:23 PM
 */

namespace App\Domain\ViewQueries;


use App\Task;

class TaskQuery
{
    /**
     * Retrieve a list of tasks.
     *
     * @return Task[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Task::latest()->get();
    }

    /**
     * Fetch details of a task.
     *
     * @param  $id
     * @return \App\Task
     */
    public function load($id)
    {
        return Task::with(['projectManager', 'property', 'taskLogs.teamMember'])->findOrFail($id);
    }
}