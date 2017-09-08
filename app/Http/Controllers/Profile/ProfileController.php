<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        return view('settings.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $input = $request -> only('display_name', 'description');
        Auth::user()->update($input);

        return view('settings.profile', ['user' => Auth::user()]);
    }

}