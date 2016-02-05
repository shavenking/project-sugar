<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name'];

    public function freetime()
    {
        return $this->hasMany(\App\Entities\Freetime::class);
    }
}