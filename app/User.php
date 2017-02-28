<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function send()
    {
        return $this->hasMany(Request::class, 'sender_id');
    }

    public function take()
    {
        return $this->hasMany(Request::class, 'taker_id');
    }
}
