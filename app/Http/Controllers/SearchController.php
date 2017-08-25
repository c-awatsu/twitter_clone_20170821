<?php

namespace App\Http\Controllers;


use App\Tweet;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $searchWord = $request->input('search');
        $searchedTweets = Tweet::searchTweets($searchWord)->get()->all();

        return view('search', compact('searchWord', 'searchedTweets'));
    }
}