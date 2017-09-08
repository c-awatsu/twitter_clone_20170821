<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/23
 * Time: 15:51
 */

namespace App\Http\Controllers;


use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('settings.account', compact('user'));
    }

    public function update(UpdateAccountRequest $request)
    {
        $input = $request->only('url_name', 'email', 'password');
        Auth::user()->update($input);

        return view('settings.account', ['user' => Auth::user()]);
    }
}