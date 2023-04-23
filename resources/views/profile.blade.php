@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')
    <div class="Container" style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}')">

        <div class="box">
            <div class="profile-box">
                <img src="{{ asset('interface_assets/edo.jpg') }}" class="profile-picture">
                <div class="profile-column">
                    <div class="profile-desc">
                        Hello,
                    </div>
                    <div class="profile-desc2">
                        {{ $user->fname . " " . $user->lname }}
                    </div>
                    <div class="button-box">
                        <div class="profile-button">
                            <a href="#" class="button">
                                <div class="button">
                                    <p>Edit profile</p>
                                </div>
                            </a>
                        </div>

                        <div class="profile-button">
                            <a href="#" class="button">
                                <div class="button">
                                    <p>View Stream Plan</p>
                                </div>
                            </a>
                        </div>
                    </div>




                </div>
            </div>
            <div class="detail-box">


                <table class="detail-table" cellspacing="8">
                    <tr>
                        <td class="detail-desc" width="25%%">First Name</td>
                        <td class="detail-desc2">{{ $user->fname }}</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Last Name</td>
                        <td class="detail-desc2">{{ $user->lname }}</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Email</td>
                        <td class="detail-desc2">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Phone Number</td>
                        <td class="detail-desc2">+6281287774009</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Gender</td>
                        <td class="detail-desc2">Male</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Birth Date</td>
                        <td class="detail-desc2">21/01/2004</td>
                    </tr>

                </table>


            </div>

            <div class="logout-box">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button button" type="submit">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
