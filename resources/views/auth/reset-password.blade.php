<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geekiga Reset Password</title>
    <link rel="icon" type="png" href="{{ asset('images/small-logo.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forgot.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}');">

    <div class="container">

        <div class="container-content1">
            <img src='{{ asset('images/GEEKIGA LOGO.png') }}' alt="Logo" class="img-content1" />
        </div>
        <div class="form">
            <form method="post" action="/reset-password" >
                @csrf
                <h3>Reset Your Password</h3>
                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $_GET['email'] }}" required autofocus autocomplete="username" readonly />
                    @error('email')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">New Password</label>
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">Confirm Password</label>

                    <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Save Password</button>



            </form>
        </div>


    </div>

</body>

</html>
