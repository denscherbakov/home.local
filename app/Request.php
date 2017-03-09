<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Request extends Model
{
    const ACCEPT = 0;

    protected $fillable = ['sender_id', 'taker_id', 'accept'];

    /**
     * Set accept attribute.
     */
    public function setAcceptAttribute()
    {
        $this->attributes['accept'] = self::ACCEPT;
    }

    public function scopeHasSendRequest($query, $user_id)
    {
        return $query->where(['sender_id' => $user_id])->noAccepted();
    }

    public function scopeHasTakeRequest($query, $user_id)
    {
        return $query->where(['taker_id' => $user_id])->noAccepted();
    }

    public function scopeFriends($query)
    {
        return $query->where(['taker_id' => Auth::user()->id])
                     ->orWhere(['sender_id' => Auth::user()->id])
                     ->accepted();
    }

    public function scopeAccepted($query)
    {
        return $query->where(['accept' => 1]);
    }

    public function scopeNoAccepted($query)
    {
        return $query->where(['accept' => self::ACCEPT]);
    }
}
