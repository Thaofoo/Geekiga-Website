<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movies;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', function (Request $request) {
    $request->validate([
        'fname' => "required",
        "lname" => "required",
        "email" => "required",
        "password" => "required",
        "cpassword" => "required"
    ]);

    dd($request->all());

});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "movie" => Movies::where('slug', "chainsaw-man-2020")->first()
    ]);
});

Route::get('/popular', function () {
    return view('home', [
        "title" => "Popular"
    ]);
});

Route::get('/watchlist', function () {
    return view('watchlist', [
        "title" => "Watch List"
    ]);
});

Route::get('/forgot', function () {
    return view('forgot');
});

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile"
    ]);
});

Route::get('/verification', function () {
    return view('verif');
});

Route::get('/movies/{slug}', function ($slug) {
    return view('movie', [
        'name' => 'movies',
        "title" => "Movie",
        "movie" => Movies::where('slug', $slug)->first()
    ]);
});
