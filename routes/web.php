<?php

use App\Models\User;
use App\Models\Genre;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WatchListController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetIndex'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

    Route::get('/auth/redirect', [GoogleController::class, 'redirect']);
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/home', [MovieController::class, 'home']);

    Route::get('/popular', [MovieController::class, 'showPopular']);

    Route::get('/watchlist', [WatchListController::class, 'show']);

    //Unused Route
    /*Route::get('/watchlist', [MovieController::class, 'showAll'])->middleware('auth');*/

    Route::get('/profile', [UserController::class, 'getProfile'])->name('profile');
    Route::post('/profile', [UserController::class, 'update']);
    Route::get('/profile/change-password', [UserController::class, 'changePassword']);
    Route::post('/profile/change-password', [UserController::class, 'updatePassword']);

    //Unused Route
    //Route::get('/profile/edit', function () {return view('profileEdit', ["title" => "Profile Edit"]);})->middleware('auth');
    //Route::post('/profile/edit', [UserController::class, 'update'])->middleware('auth');
    //Route::get('/profile/edit2', [UserController::class, 'getProfile2'])->middleware('auth');

    Route::get('/movies', [MovieController::class, 'showAll']);
    Route::get('/movies/{slug}', [MovieController::class, 'show']);
    Route::post('/movies/{slug}', [MovieController::class, 'watchlist']);
    Route::get('/movies/{slug}/play', [MovieController::class, 'play']);

    Route::get('/genre/{name}', [MovieController::class, 'showMovieByGenre']);

    Route::post('/search',[MovieController::class,'searchMovie']);
    Route::get('/search',function () {return redirect('/home');});
});

Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailController::class, 'sendVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify', [EmailController::class, 'index'])->middleware(['auth', 'verify'])->name('verification.notice');

Route::middleware('admin')->group(function () {
    Route::get('/admin',function () {return redirect('/admin/home');});
    Route::get('/admin/home',[DashboardController::class, 'index']);

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


