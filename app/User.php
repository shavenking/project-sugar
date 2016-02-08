<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities()
    {
        return $this->belongsToMany(\App\Entities\Activity::class)
                    ->withPivot('is_admin')
                    ->withTimestamps();
    }

    public function freetimeSet()
    {
        return $this->hasMany(\App\Entities\Freetime::class);
    }

    public function goals()
    {
        return $this->belongsToMany(\App\Entities\Goal::class)
            ->withPivot('is_admin')
            ->withTimestamps();
    }
}
