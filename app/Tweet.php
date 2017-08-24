<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $tweetUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet authUserTweets()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet followingTweets()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet homeTimelineTweets()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUserId($value)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'body',
        'created_at'
    ];

    public function tweetUser()
    {
        return $this->belongsTo('App\User','user_id');
    }


    public function scopeFollowingTweets(Builder $query)
    {
        return $query->whereIn('user_id', Auth::user()->following()->allRelatedIds());
    }

    public function scopeAuthUserTweets(Builder $query)
    {
        return $query->Where('user_id', Auth::user()->id);
    }

    public function scopeHomeTimelineTweets(Builder $query){
        return $query->followingTweets()->orWhere(function ($query){
            $query->authUserTweets();
        })->orderBYDesc('created_at');
    }


}