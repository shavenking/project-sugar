<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function getType()
    {
        return 'tasks';
    }
}
