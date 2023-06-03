<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    public function store(Request $request) {
        $validated = $request->validate([
            'fname' => "required|max:255",
            "lname" => "required|max:255",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:8|max:255",
            "cpassword" => "required|same:password"
        ]);

        unset($validated['cpassword']);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        event(new Registered($user));
        Auth::login($user);
        return redirect('/email/verify');
    }
}
