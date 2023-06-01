@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile2.css') }}">
<title> Geekiga - Change Password</title>
@endsection

@section('content')
    <div class="Container" style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}')">

        <div class="box">
            <h1>
                Change Password
            </h1>
            <div class="detail-box">

                <form method="post" action="/profile/change-password">
                    @csrf
                    @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                    <table class="detail-table" cellspacing="8">
                        <tr>
                            <td class="detail-desc" width="25%%">Old Password</td>
                            <td class="detail-input">
                                <input type="password" id="old_password" name="old_password" class="inputprofile @error('old_password') isInvalid @enderror">
                                @error('old_password')
                                <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-desc" width="25%%">New Password</td>
                            <td class="detail-input">
                                <input type="password" id="new_password" name="new_password" class="inputprofile @error('new_password') isInvalid @enderror">
                                @error('new_password')
                                <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="detail-desc" width="25%%">New Password</td>
                            <td class="detail-input">
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="inputprofile @error('new_password_confirmation') isInvalid @enderror">
                                @error('new_password_confirmation')
                                <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </table>
                    <button class="logout-button button" id="savebutton" type="submit">
                        Save
                    </button>
                </form>
            </div>

        </div>

    </div>

    <script src="{{ asset("js/profile-edit.js") }}"></script>
@endsection
