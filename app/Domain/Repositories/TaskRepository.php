<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 7:23 PM
 */

namespace App\Domain\Repositories;


use App\Task;
use Illuminate\Support\Facades\DB;

class TaskRepository
{
    /**
     * Save task details.
     *
     * @param array $data
     */
    public function save($data)
    {
        Task::create($data);
    }

    /**
     * Save updated task details.
     *
     * @param $id
     * @param array $data
     */
    public function update($id, $data)
    {
        DB::table('tasks')->where('id', $id)->update($data);
    }

    /**
     * Remove a task.
     *
     * @param  $id
     */
    public function delete($id)
    {
        DB::table('tasks')->delete($id);
    }
}