<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    protected $fillable = ['user_id', 'task_id', 'job_description', 'deadline'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function teamMember()
    {
        return $this->belongsTo(User::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
