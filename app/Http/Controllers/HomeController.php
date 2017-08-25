<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;

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
        $user = Auth::user();
        $sortedTweets = Tweet::homeTimelineTweets()->get();

        return view('home', compact( 'user','sortedTweets'));
    }

    public function tweet(TweetRequest $request)
    {

        Tweet::create([
            'user_id' => Auth::user() -> id,
            'body' => $request->input('body'),
        ]);

        return redirect('home');

    }
}
