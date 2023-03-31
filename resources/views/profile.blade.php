@extends('layouts.loggedtemplate')
@section('title', 'Geekiga - Profile')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="Container">

        <div class="box">
            <div class="profile-box">
                <img src="{{ asset('interface_assets/edo.jpg') }}" class="profile-picture">
                <div class="profile-column">
                    <div class="profile-desc">
                        Hello,
                    </div>
                    <div class="profile-desc2">
                        Nathanael Erlando Putra
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
                        <td class="detail-desc2">Nathanael</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Last Name</td>
                        <td class="detail-desc2">Erlando Putra</td>
                    </tr>
                    <tr>
                        <td class="detail-desc">Email</td>
                        <td class="detail-desc2">erlando.putra@gmail.com</td>
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
                <div class="logout-button">
                    <a href="{{ URL::to('') }}" class="logout-button">
                        <div class="button">
                            <p>Sign Out</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
