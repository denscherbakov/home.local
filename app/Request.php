<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Request extends Model
{
    const ACCEPT = 1;
    const NO_ACCEPT = 0;

    protected $fillable = ['sender_id', 'taker_id', 'accept'];

    /**
     * Set accept attribute.
     */
    public function setAcceptAttribute()
    {
        $this->attributes['accept'] = self::NO_ACCEPT;
    }

    public function scopeWhereSend($query)
    {
        return $query->where(['sender_id' => Auth::id()]);
    }

    public function scopeWhereTake($query)
    {
        return $query->where(['taker_id' => Auth::id()]);
    }


    public function scopeAccepted($query)
    {
        return $query->where(['accept' => self::ACCEPT]);
    }

    public function scopeNoAccepted($query)
    {
        return $query->where(['accept' => self::NO_ACCEPT]);
    }
}
