<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function userDetail()
    {
        return $this->belongsToMany(UserDetail::class);
    }
}
