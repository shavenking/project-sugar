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
}
