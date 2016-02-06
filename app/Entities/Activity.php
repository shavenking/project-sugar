<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name'];

    public function attendees()
    {
        return $this->belongsToMany(\App\User::class)
            ->withPivot('is_admin')
            ->withTimestamps();
    }

    public function scopeWhereUserAttended($query, \App\User $user)
    {
        return $this->userAttended($user);
    }

    public function scopeWhereUserNotAttended($query, \App\User $user)
    {
        return $this->userAttended($user, true);
    }

    protected function userAttended(\App\User $user, $inverse = false)
    {
        $operator = $inverse ? '=' : '>=';
        $count = $inverse ? 0 : 1;

        return $this->whereHas('attendees', function ($q) use ($user) {
            $q->whereUserId($user->id);
        }, $operator, $count);
    }
}
