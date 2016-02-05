<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Freetime extends Model
{
    protected $table = 'freetime';

    protected $fillable = ['start_at', 'end_at'];

    protected $dates = ['start_at', 'end_at'];
}
