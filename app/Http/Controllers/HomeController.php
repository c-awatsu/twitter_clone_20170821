<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $displayName = Auth::user() -> display_name;
        $urlName = Auth::user() -> url_name;
        $description = Auth::user() -> description;

        return view('home',compact('displayName','urlName','description'));
    }
}
