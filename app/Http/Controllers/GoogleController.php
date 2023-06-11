<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $googleuser = Socialite::driver('google')->user();

        $userTemp = User::where('email', $googleuser->email)->firstOrFail();
        $user = User::updateOrCreate([
            'email' => $googleuser->email,

        ], [
            'fname' => $userTemp->fname ?? $googleuser->user['given_name'],
            'lname' => $userTemp->lname ?? $googleuser->user['family_name'],
            'image' => $userTemp->image ?? $googleuser->user['picture'],
            'email' => $userTemp->email ?? $googleuser->email,
            'google_id' => $googleuser->id,
            'google_token' => $googleuser->token,
            'google_refresh_token' => $googleuser->refreshToken,

        ]);

        Auth::login($user);

        return redirect('/home');
    }
}
