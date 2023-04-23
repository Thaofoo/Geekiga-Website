<?php

namespace App\Http\Controllers;

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

}
