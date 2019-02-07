<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone'];

    protected $appends = ['full_name'];

    protected $table = 'staff';

    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'] = "{$this->first_name} {$this->last_name}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
