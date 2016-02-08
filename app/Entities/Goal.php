<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['title', 'due_at'];

    protected $dates = ['due_at'];

    public function getType()
    {
        return 'goals';
    }

    public function tasks()
    {
        return $this->hasMany(\App\Entities\Task::class);
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class)
            ->withPivot('is_admin')
            ->withTimestamps();
    }
}
