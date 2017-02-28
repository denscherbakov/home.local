<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function child()
    {
        return $this->hasMany(Menu::class, 'pid', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Menu::class, 'id', 'pid');
    }
}
