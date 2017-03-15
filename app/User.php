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

    /**
     * Every user has his detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    /**
     * Every user can send a request to friends.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function send()
    {
        return $this->hasMany('App\Request', 'sender_id', 'id');
    }

    /**
     * Every user cas get a request to friends.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function take()
    {
        return $this->hasMany('App\Request', 'taker_id', 'id');
    }

    /**
     * Every user can has many articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function article()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Every user can like articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likes()
    {
        return $this->belongsToMany('App\Article', 'likes', 'user_id', 'article_id')->withTimestamps();
    }

}
