<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Geekiga - Geek Out With Geekiga</title>
        <link rel="icon" type="png" href="{{ asset('images/small-logo.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/landing.css') }}" >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="navbar_container">
            <nav class="navbar_logged_off">
                <div class="navbar_logged_off_left">
                    <img src="{{ asset('images/GEEKIGA LOGO.png') }}" height="30px">
                </div>
                <div class="navbar_logged_off_right">
                    <a href="signUp.html" class="navbar_logged_off_right_signup">
                        <img src="{{ asset('interface_assets/Person.svg') }}" height="16px">
                        <img src="{{ asset('interface_assets/Line.svg') }}" height="16px">
                        Sign Up
                    </a>
                    or
                    <!-- <a href="{{ URL::to('login') }}" class="navbar_logged_off_right_login">
                        <img src="{{ asset('interface_assets/Person.svg') }}" height="16px">
                        <img src="{{ asset('interface_assets/Line.svg') }}" height="16px">
                        Sign In
                    </a> -->
                    <a href="{{ URL::to('login') }}" class="navbar_logged_off_right_login2">
                        Sign In
                    </a>
                </div>
            </nav>
        </div>

        <div class="hero">
            <img src="{{ asset('interface_assets/hero_pic.png') }}" width="80%">
            <div class="hero_title">
                <div class="hero_title_featured">
                    Featured Show
                </div>
                <img class="hero_title_wall" src="{{ asset('interface_assets/hero_title.png') }}" width="750px">
                <div class="hero_title_subdesc">
                    2023 • 11 Episodes • 1 Season
                </div>
                <div class="hero_title_desc">
                    Chainsaw Man follows the story of Denji, an impoverished young man who makes a contract that fuses his
                    body with that of a dog-like devil named Pochita, granting him the ability to transform parts of his
                    body into chainsaws.
                </div>
                <a href="{{ URL::to('login') }}" class="hero_title_login">
                    <img src="{{ asset('interface_assets/tri.svg') }}">
                    <img src="{{ asset('interface_assets/Line.svg') }}">
                    Log In to Play
                </a>
            </div>
        </div>

        <div class="tagline" style="background-image: url('{{ asset('interface_assets/tagline_bg.png')}}');">

        </div>

    </body>
</html>
