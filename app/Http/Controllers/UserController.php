<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function update(Request $request){

        session()->flash('status', 'updating');

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $status = "active";

        $validated = $request->validate([
            'fname' => "max:255|nullable",
            "lname" => "nullable|max:255",
            "email" => "nullable|email:dns|unique:users",
            "phone" => "nullable|unique:users",
            'image' => "mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $input = array_filter($request->except('image'));

        if ($request['image'] != null){
            $fileName = Auth::id() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/profile', $fileName);
            $input['image'] = asset('storage/images/profile/' . $fileName);
        }



        $user->update($input);
        session()->flash('success', 'Profile Updated');

        return Redirect::route('profile')->with( ['data' => $status] );
    }

    public function changePassword(){
        return view("changepassword", [
            "title" => "Profile",
            "user" => Auth::user()
        ]);
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/profile')->with("cpass", "Password changed successfully!");
}

}
