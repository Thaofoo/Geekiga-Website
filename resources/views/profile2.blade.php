@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile2.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')
    <div class="Container" style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}')">

        <div class="box">
            <div class="profile-box">
                @if ($user->image != null)
                            <img class="profile-picture" src="{{ asset('storage/images/profile/'.$user->image) }}">
                            @else
                            <img class="profile-picture" src="{{ asset('interface_assets/default.webp') }}">
                            @endif
                <div class="profile-column">
                    <div class="profile-desc">
                        Hello,
                    </div>
                    <div class="profile-desc2">
                        {{ $user->fname . " " . $user->lname }}
                    </div>
                    <div class="button-box">
                        <div class="profile-button">

                                <a class="button" id="edit-button" onclick="changeEdit()">
                                    Edit Profile
                                </a>

                                <a class="button" id="edit-button" href="{{ URL::to("/profile/change-password") }}">
                                    Change Password
                                </a>

                        </div>
                    </div>




                </div>
            </div>


                @if (session()->has('success'))

                <div class="alert alert-success profile-alert" role="alert">
                    Profile changed sucessfully
                </div>

                @include('layouts.profileboxDetail')

                @elseif (session()->has('status'))

                @include('layouts.profileboxInput')

                @else
                @if (session('cpass'))
                <div class="alert alert-success profile-alert" role="alert">
                    {{ session('cpass') }}
                </div>
                @endif
                @include('layouts.profileboxDetail')

                @endif
        </div>

    </div>

    <script src="{{ asset("js/profile-edit.js") }}"></script>
@endsection
