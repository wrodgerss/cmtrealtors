<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    private $fillable = ['user_id', 'task_id', 'job_description', 'deadline'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
