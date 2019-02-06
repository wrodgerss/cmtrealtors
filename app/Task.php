<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'description', 'deadline', 'status'];

    protected $dates = ['deleted_at', 'deadline'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskLogs()
    {
        return $this->hasMany(TaskLog::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
