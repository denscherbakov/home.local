<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'published_at', 'user_id'];

    /**
     * Set published_at attribute.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Set user_id attribute.
     *
     * @internal param $author
     */
    public function setAuthorAttribute()
    {
        $this->attributes['user_id'] = Auth::user()->id;
    }

    /**
     * Select all current user's articles.
     *
     * @param $query
     * @return mixed
     */
    public function scopeMyArticles($query)
    {
        return $query->where(['user_id' => Auth::user()->id]);
    }

    /**
     * Every article has a author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Check article was liked by user.
     *
     * @return bool
     */
    public function liked()
    {
        return (bool) Like::where('user_id', Auth::id())->where('article_id', $this->id)->first();
    }
}
