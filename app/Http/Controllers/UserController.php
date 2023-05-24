<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //Return data user
    public function getProfile(){

        $gender = Auth::user()->gender;
        if ($gender == 'm'){
            $gender = 'Male';
        }
        elseif ($gender == "f"){
            $gender = 'Female';
        }

        return view('profile2', [
            "title" => "Profile",
            "user" => Auth::user(),
            "gender" => $gender
        ]);
    }

    public function getProfile2(){
        return view('profile2', [
            "title" => "Profile",
            "user" => Auth::user(),
            "status" => Session::get('data')
        ]);
    }

    public function update(Request $request)
    {
        session()->flash('status', 'updating');

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $status = "active";

        $validated = $request->validate([
            'fname' => "max:255|nullable",
            "lname" => "nullable|max:255",
            "email" => "nullable|email:dns|unique:users",
            "phone" => "unique:users"
        ]);

        $input = array_filter($request->all());

        $user->update($input);
        session()->flash('success', 'Profile Updated');

        return Redirect::route('profile')->with( ['data' => $status] );
    }

}
