@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile2.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')
    <div class="Container" style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}')">

        <div class="box">
            <div class="profile-box">
                <img src="{{ asset('storage/images/profile/'.$user->image) }}" class="profile-picture">
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

                        </div>
                    </div>




                </div>
            </div>


                @if (session()->has('success'))

                @include('layouts.profileboxDetail')

                @elseif (session()->has('status'))

                @include('layouts.profileboxInput')

                @else

                @include('layouts.profileboxDetail')

                @endif
        </div>

    </div>

    <script src="{{ asset("js/profile-edit.js") }}"></script>
@endsection
