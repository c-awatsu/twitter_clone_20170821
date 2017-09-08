<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 11:37
 */

namespace App\Http\Controllers;


use App\Tweet;
use App\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function following($urlName)
    {
        $user = User::whereUrlName($urlName)->first();
        $authUser = Auth::user();
        $profiles = $user->following;

        return view('user.following', compact('authUser', 'user', 'profiles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers($urlName)
    {
        $user = User::whereUrlName($urlName)->first();
        $authUser = Auth::user();
        $profiles = $user->followers;

        return view('user.followers', compact('authUser', 'user', 'profiles'));
    }

    public function profile($urlName)
    {
        $user = User::whereUrlName($urlName)->first();
        $authUser = Auth::user();
        if (!is_null($user)) {
            $sortedTweets = Tweet::userTweets($urlName)->get()->all();
        }
        return view('user.profile', compact('authUser', 'user', 'sortedTweets'));
    }

    public function followUser($followedUserUrlName)
    {
        $followedUser = User::whereUrlName($followedUserUrlName)->first();
        Auth::user()->following()->attach($followedUser->id);

        return redirect()->back();
    }

    public function unFollowUser($unFollowedUserUrlName)
    {
        $unFollowedUser = User::whereUrlName($unFollowedUserUrlName)->first();
        Auth::user()->following()->detach($unFollowedUser->id);

        return redirect()->back();
    }


}