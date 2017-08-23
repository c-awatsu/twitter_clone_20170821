<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 11:37
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function following()
    {
        $user = Auth::user();
        $profiles = $user -> following;

        return view('user.following',compact('user','profiles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers()
    {
        $user = Auth::user();
        $profiles = $user -> followers;

        return view('user.followers',compact('user','profiles'));
    }
}