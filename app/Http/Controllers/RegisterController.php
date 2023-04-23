<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // Return satu movie berdasarkan slug
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
        User::create($validated);
        return redirect('/login');
    }
}
