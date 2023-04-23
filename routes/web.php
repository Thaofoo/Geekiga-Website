<?php

use App\Models\User;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MovieController;

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

Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "movie" => Movies::where('slug', "chainsaw-man-2020")->first()
    ]);
});

Route::get('/popular', function () {
    return view('home', [
        "title" => "Popular",
        "movie" => Movies::where('slug', "chainsaw-man-2020")->first()
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

Route::get('/movies/{slug}', [MovieController::class, 'show']);
