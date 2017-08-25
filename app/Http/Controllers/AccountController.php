<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 15:51
 */

namespace App\Http\Controllers;


use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdateProfileRequest;
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

    public function updateProfile(UpdateProfileRequest $request)
    {
        $input = $request -> only('display_name', 'description');
        Auth::user()->update($input);

        return view('settings.profile', ['user' => Auth::user()]);
    }

    public function updateAccount(UpdateAccountRequest $request)
    {
        $input = $request->only('url_name', 'email', 'password');
        Auth::user()->update($input);

        return view('settings.account', ['user' => Auth::user()]);
    }
}