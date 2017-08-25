<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\TweetRequest
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet searchTweets($searchWord)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet timeline()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet userTweets($urlName)
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
        return $this->belongsTo('App\User', 'user_id');
    }


    public function scopeFollowingTweets(Builder $query)
    {
        return $query->whereIn('user_id', Auth::user()->following()->allRelatedIds());
    }

    public function scopeAuthUserTweets(Builder $query)
    {
        return $query->Where('user_id', Auth::user()->id);
    }

    public function scopeUserTweets(Builder $query,$urlName){
        $user = User::whereUrlName($urlName)->first();
        return $query->where('user_id', $user->id)->timeline();
    }

    public function scopeSearchTweets(Builder $query, $searchWord)
    {
        $splitedWord = preg_split("/[\s]+/", $searchWord);
        foreach ($splitedWord as $word) {
            $query->where('body', 'LIKE', "%$word%");
        }
        return $query->timeline();
    }

    public function scopeHomeTimelineTweets(Builder $query)
    {
        return $query->followingTweets()->orWhere(function ($query) {
            $query->authUserTweets();
        })->timeline();
    }

    public function scopeTimeline(Builder $query)
    {
        return $query->latest();
    }


}