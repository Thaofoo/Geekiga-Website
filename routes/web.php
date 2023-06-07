<?php

use App\Http\Controllers\PcloudController;
use App\Models\User;
use App\Models\Genre;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WatchListController;
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


});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

    Route::get('/home', [MovieController::class, 'home'])->middleware('auth');

    Route::get('/popular', [MovieController::class, 'showPopular'])->middleware('auth');

    Route::get('/watchlist', [WatchListController::class, 'show'])->middleware('auth');

    //Unused Route
    /*Route::get('/watchlist', [MovieController::class, 'showAll'])->middleware('auth');*/

    Route::get('/profile', [UserController::class, 'getProfile'])->middleware('auth')->name('profile');
    Route::post('/profile', [UserController::class, 'update'])->middleware('auth');
    Route::get('/profile/change-password', [UserController::class, 'changePassword'])->middleware('auth');
    Route::post('/profile/change-password', [UserController::class, 'updatePassword'])->middleware('auth');

    //Unused Route
    //Route::get('/profile/edit', function () {return view('profileEdit', ["title" => "Profile Edit"]);})->middleware('auth');
    //Route::post('/profile/edit', [UserController::class, 'update'])->middleware('auth');
    //Route::get('/profile/edit2', [UserController::class, 'getProfile2'])->middleware('auth');

    Route::get('/movies', [MovieController::class, 'showAll'])->middleware('auth');
    Route::get('/movies/{slug}', [MovieController::class, 'show'])->middleware('auth');
    Route::post('/movies/{slug}', [MovieController::class, 'watchlist'])->middleware('auth');
    Route::get('/movies/{slug}/play', [MovieController::class, 'play'])->middleware('auth');

    Route::get('/genre/{name}', [MovieController::class, 'showMovieByGenre'])->middleware('auth');

    Route::post('/search',[MovieController::class,'searchMovie'])->middleware('auth');
    Route::get('/search',function () {return redirect('/home');})->middleware('auth');
});

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::get('/email/verify', function () {
        return view('auth.verify-email', ['user' => Auth::user()]);
    })->middleware(['auth', 'verify'])->name('verification.notice');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([

            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',

        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest')->name('password.update');

    Route::get('/auth/redirect', function () {
        return Socialite::driver('google')->redirect();
    });

    Route::get('/auth/google/callback', function () {
        $googleuser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleuser->email,

        ], [
            'fname' => $googleuser->user['given_name'],
            'lname' => $googleuser->user['family_name'],
            'email' => $googleuser->email,
            'google_id' => $googleuser->id,
            'google_token' => $googleuser->token,
            'google_refresh_token' => $googleuser->refreshToken,

        ]);

        Auth::login($user);

        return redirect('/home');
    });

    Route::get("/uploadvideo", [PcloudController::class, "viewUpload"]);
    Route::post("/uploadvideo", [PcloudController::class, "uploadVideo"]);

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


