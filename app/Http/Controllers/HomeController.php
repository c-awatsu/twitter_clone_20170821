<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
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
        $user = Auth::user();

        //$now = new Carbon(Carbon::now(new DateTimeZone('Asia/Tokyo')));
        //$subtractTime = $now -> sub(date_interval_create_from_date_string($user->created_at));
        $sortedTweet = $user -> tweets ->sortByDesc('created_at');
        return view('home', compact( 'user','sortedTweet'));
    }

    public function tweet(Request $request)
    {
        $this->validate($request, ['body' => 'max:140']);

        Tweet::create([
            'user_id' => Auth::user() -> id,
            'body' => $request->input('body'),
        ]);

        return redirect('home');

    }
}
