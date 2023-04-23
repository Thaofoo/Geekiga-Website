<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geekiga Login</title>
    <link rel="icon" type="png" href="{{ asset('images/small-logo.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/signUp.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('interface_assets/tagline_bg.png') }}');">

    <div class="container">

        <div class="container-content1">
            <img src="{{ asset('images/GEEKIGA LOGO.png') }}" alt="Logo" class="img-content1" />
        </div>
        <div class="form">
            <form action="/signup" method="POST">
                <h3>Sign Up</h3>

                <!-- <label for="username">Username</label> -->
                @csrf
                <div class="inputwrapper">
                    <input type="text" placeholder="First Name" id="fname" name="fname" class="@error('fname') isInvalid @enderror" value="{{ old('fname') }}">
                    @error('fname')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputwrapper">
                    <input type="text" placeholder="Last Name" id="lname" name="lname" class="@error('lname') isInvalid @enderror" value="{{ old('lname') }}">
                    @error('lname')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputwrapper">
                    <input type="email" placeholder="Email" id="email" name="email" class="@error('email') isInvalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputwrapper">
                    <input type="password" placeholder="Password" id="password" name="password" class="@error('password') isInvalid @enderror" >
                    @error('password')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputwrapper">
                    <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" class="@error('cpassword') isInvalid @enderror">
                    @error('cpassword')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>

                <button class="signup-button" type="submit">Sign Up</button>

                <div class="SizedBox"></div>
                <div class="SizedBox"></div>
                <p class="suggest">Already have an account? <a href="{{ URL::to('login') }}" class="login">Login!</a>
                </p>
            </form>
        </div>


    </div>
</body>

</html>
