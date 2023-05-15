<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Return data user
    public function getProfile(){
        return view('profile', [
            "title" => "Profile",
            "user" => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'fname' => "max:255|nullable",
            "lname" => "nullable|max:255",
            "email" => "nullable|email:dns|unique:users",
        ]);

        $input = array_filter($request->all());

        $user->update($input);

        return redirect("/profile");
    }

}
