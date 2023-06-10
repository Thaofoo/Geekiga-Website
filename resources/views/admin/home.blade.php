@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/home.css') }}">
<title> Geekiga Admin - {{ $title }} </title>
@endsection

@section('content')

<h3>Dashboard</h3>

<div class="stat-box">
    <div class="stat-registered">
        <div class="stat-title">
            REGISTERED USERS
        </div>
        <div class="stat-num">
            {{ $userCount }} <span>Users</span>
        </div>
    </div>
    <div class="stat-online">
        <div class="stat-title">
            ONLINE USERS
        </div>
        <div class="stat-num">
            {{ $onlineCount }} <span>Users</span>
        </div>
    </div>
    <div class="stat-uploaded">
        <div class="stat-title">
            MOVIES COUNT
        </div>
        <div class="stat-num">
            {{ $movieCount }} <span>Movies</span>
        </div>
    </div>
</div>

<div class="about-us">
        <h2>About Us</h2>
        <div class="img-container">
            <img src="{{ asset("images/edo.jpg") }}">
            <img src="{{ asset("images/topik.jpg") }}">
        </div>
        <span>
            We are two 4th semester Information Systems students with a passion for technology and innovation.
            Our goal is to create a streaming website that is user-friendly and informative, providing valuable resources and insights to our audience.
            With our combined skills and knowledge, we strive to deliver an engaging online experience that meets the needs of our users.
        </span>
</div>

@endsection
