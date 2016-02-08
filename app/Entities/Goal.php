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
}
