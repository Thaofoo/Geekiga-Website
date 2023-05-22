@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')
    <div class="Container" style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}')">

        <div class="container-edit">
            <div>
                <form id="profile-edit" action="/profile/edit" method="POST">
                    <h3>Edit Profile</h3>

                    <!-- <label for="username">Username</label> -->
                    @csrf
                    <div class="inputwrapper">
                        <input class="inputprofile" type="text" placeholder="First Name" id="fname" name="fname" class="@error('fname') isInvalid @enderror" value="{{ old('fname') }}">
                        @error('fname')
                        <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="inputwrapper">
                        <input class="inputprofile" type="text" placeholder="Last Name" id="lname" name="lname" class="@error('lname') isInvalid @enderror" value="{{ old('lname') }}">
                        @error('lname')
                        <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="inputwrapper">
                        <input class="inputprofile" type="email" placeholder="Email" id="email" name="email" class="@error('email') isInvalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <div class="error_msg">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="buttons-container">
                        <button class="signup-button" type="submit">Save</button>
                        <a class="cancel-button" href="{{ URL::to('/profile') }}" type="none">Cancel</a>
                    </div>

                    <div class="SizedBox"></div>
                    <div class="SizedBox"></div>
                </form>
            </div>
        </div>


    </div>



@endsection
