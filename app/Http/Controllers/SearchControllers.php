<?php

namespace App\Http\Controllers;


class SearchControllers extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        return view('search');
    }
}