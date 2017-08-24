<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 11:37
 */

namespace App\Http\Controllers;


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

        return view('user.following', compact('authUser','user', 'profiles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers($urlName)
    {
        $user = User::whereUrlName($urlName)->first();
        $authUser = Auth::user();
        $profiles = $user->followers;

        return view('user.followers', compact('authUser','user', 'profiles'));
    }

    public function profile($urlName){
        $user = User::whereUrlName($urlName)->first();
        $authUser = Auth::user();
        $sortedTweets = $user -> tweets -> sortByDesc('created_at');

        return view('user.profile',compact('authUser','user','sortedTweets'));
    }

    public function followerUser($authUser,$followerUser)
    {

    }


}