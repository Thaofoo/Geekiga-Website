<?php

use App\Models\User;
use App\Models\Genre;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;

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
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');

Route::post('/signup', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "movie" => Movies::where('slug', "chainsaw-man-2020")->first()
    ]);

})->middleware('auth');

Route::get('/popular', [MovieController::class, 'showAll'])->middleware('auth');

Route::get('/watchlist', function () {
    return view('watchlist', [
        "title" => "Watch List",
        "movies" => Auth::user()->watchlist
    ]);
})->middleware('auth');

/*Route::get('/watchlist', [MovieController::class, 'showAll'])->middleware('auth');*/

Route::get('/forgot', function () {
    return view('forgot');
})->middleware('guest');

Route::get('/profile', [UserController::class, 'getProfile'])->middleware('auth')->name('profile');

Route::get('/profile/edit', function () {
    return view('profileEdit', [
        "title" => "Profile Edit"
    ]);
})->middleware('auth');

Route::post('/profile', [UserController::class, 'update'])->middleware('auth');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('auth');
Route::get('/profile/edit2', [UserController::class, 'getProfile2'])->middleware('auth');

Route::get('/verification', function () {
    return view('verif');
})->middleware('auth');

Route::get('/movies/{slug}', [MovieController::class, 'show'])->middleware('auth');
Route::post('/movies/{slug}', [MovieController::class, 'watchlist'])->middleware('auth');



Route::get('/genre/{name}', [MovieController::class, 'showMovieByGenre'])->middleware('auth');

Route::post('/search',[MovieController::class,'searchMovie'])->middleware('auth');
Route::get('/search',function () {
    return redirect('/home');
});
