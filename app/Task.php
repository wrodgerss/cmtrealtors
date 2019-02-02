<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    private $fillable = ['user_id', 'title', 'description'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
