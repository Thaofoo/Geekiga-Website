<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailController extends Controller

{

    public function index() {
        return view('auth.verify-email', ['user' => Auth::user()]);
    }

    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home');
    }

    public function sendVerification(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
