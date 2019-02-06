<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['tasklog_id', 'user_id', 'body', 'created_at'];

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $table = 'feedbacks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskLog()
    {
        return $this->belongsTo(TaskLog::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
