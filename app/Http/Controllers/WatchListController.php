<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{
    public function show() {
    return view('watchlist', [
        "title" => "Watch List",
        "movies" => Auth::user()->watchlist,
        "user" => Auth::user()
    ]);
}
}
