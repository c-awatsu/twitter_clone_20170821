<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 15:51
 */

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        $user = Auth::user();
        return view('settings.account', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();
        return view('settings.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        Auth::user() -> update([
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
            'updated_at ' => Carbon::now(),
        ]);
        return view('settings.profile',['user'=>Auth::user()]);
    }
}