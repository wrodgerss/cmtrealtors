<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace App\Domain\ViewQueries;


use App\TaskLog;

class TaskLogQuery
{
    /**
     * Retrieve a task log.
     *
     * @param  $id
     * @return \App\TaskLog
     */
    public function load($id)
    {
        return TaskLog::with(['teamMember', 'feedbacks.replies'])->findOrFail($id);
    }
}