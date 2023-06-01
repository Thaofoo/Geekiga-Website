<?php

use App\Models\User;
use App\Models\Genre;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WatchListController;
use App\Http\Controllers\PopularController;

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
Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('welcome');});

    Route::get('/login', function () {return view('login');})->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/signup', function () {return view('signup');});
    Route::post('/signup', [RegisterController::class, 'store']);

    Route::get('/forgot', function () {return view('forgot');});
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

    Route::get('/home', [MovieController::class, 'home'])->middleware('auth');

    Route::get('/popular', [MovieController::class, 'showPopular'])->middleware('auth');

    Route::get('/watchlist', [WatchListController::class, 'show'])->middleware('auth');

    //Unused Route
    /*Route::get('/watchlist', [MovieController::class, 'showAll'])->middleware('auth');*/

    Route::get('/profile', [UserController::class, 'getProfile'])->middleware('auth')->name('profile');
    Route::post('/profile', [UserController::class, 'update'])->middleware('auth');

    //Unused Route
    //Route::get('/profile/edit', function () {return view('profileEdit', ["title" => "Profile Edit"]);})->middleware('auth');
    //Route::post('/profile/edit', [UserController::class, 'update'])->middleware('auth');
    //Route::get('/profile/edit2', [UserController::class, 'getProfile2'])->middleware('auth');

    Route::get('/verification', function () {return view('verif');})->middleware('auth');

    Route::get('/movies', [MovieController::class, 'showAll'])->middleware('auth');
    Route::get('/movies/{slug}', [MovieController::class, 'show'])->middleware('auth');
    Route::post('/movies/{slug}', [MovieController::class, 'watchlist'])->middleware('auth');

    Route::get('/genre/{name}', [MovieController::class, 'showMovieByGenre'])->middleware('auth');

    Route::post('/search',[MovieController::class,'searchMovie'])->middleware('auth');
    Route::get('/search',function () {return redirect('/home');})->middleware('auth');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin',function () {return redirect('/admin/home');});
    Route::get('/admin/home',function () {return view('admin.home', ["title" => "Home"]);});

    Route::get('/admin/movies',[MovieController::class, 'showAllAdmin']);
    Route::get('/admin/movies/add', [MovieController::class, 'movieAddPage']);
    Route::post('/admin/movies/add', [MovieController::class, 'store']);
    Route::get('/admin/movies/{slug}', [MovieController::class, 'showAdmin']);
    Route::post('/admin/movies/{slug}/delete', [MovieController::class, 'delete']);
    Route::post('/admin/movies/{slug}/edit', [MovieController::class, 'update']);

    Route::get('/admin/popular', [MovieController::class, 'popularAdmin']);
    Route::get('/admin/popular/add', [PopularController::class, 'add']);
    Route::post('/admin/popular/add', [PopularController::class, 'update']);
    Route::get('/admin/popular/delete', [PopularController::class, 'remove']);
    Route::post('/admin/popular/delete', [PopularController::class, 'update']);

    Route::get('/admin/genre', [GenreController::class, 'showAll']);
    Route::get('/admin/genre/add', [GenreController::class, 'addGenre']);
    Route::post('/admin/genre/add', [GenreController::class, 'storeGenre']);
    Route::get('/admin/genre/{slug}', [GenreController::class, 'show']);
    Route::post('/admin/genre/{slug}', [GenreController::class, 'deleteGenre']);
    Route::get('/admin/genre/{slug}/add', [GenreController::class, 'addMovie']);
    Route::post('/admin/genre/{slug}/add', [GenreController::class, 'storeMovie']);

});


