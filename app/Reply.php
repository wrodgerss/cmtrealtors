<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    private $fillable = ['feedback_id', 'user_id', 'body', 'created_at'];

    public $timestamps = false;

    public function getDates()
    {
        return array('created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
