<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 8:56 PM
 */

namespace App\Domain\Repositories;


use App\TaskLog;
use Illuminate\Support\Facades\DB;

class TaskLogRepository
{
    /**
     * Save task log details.
     *
     * @param array $data
     */
    public function save($data)
    {
        TaskLog::create($data);
    }

    /**
     * Get a task log.
     *
     * @param  $id
     * @return \App\TaskLog
     */
    public function fetch($id)
    {
        return TaskLog::findOrFail($id);
    }

    /**
     * Save updated task log details.
     *
     * @param $id
     * @param array $data
     */
    public function update($id, $data)
    {
        DB::table('task_logs')->where('id', $id)->update($data);
    }

    /**
     * Remove a task log.
     *
     * @param $id
     */
    public function delete($id)
    {
        DB::table('task_logs')->delete($id);
    }
}