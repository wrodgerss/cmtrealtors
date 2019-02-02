<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    private $fillable = ['tasklog_id', 'user_id', 'body', 'created_at'];

    public $timestamps = false;

    public function getDates()
    {
        return array('created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskLog()
    {
        return $this->belongsTo(TaskLog::class);
    }
}
