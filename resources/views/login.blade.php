<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Geekiga</title>
    <link rel="icon" type="png" href="{{ asset('images/small-logo.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
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
            <form action="/login" method="POST">
                @csrf
                <h3>Sign In</h3>

                <!-- <label for="username">Username</label> -->
                <div class="inputwrapper">
                    <input class="@error('email') isInvalid @enderror" type="email" placeholder="Email" id="email" name="email" autofocus required/>
                    @error('email')
                        <div class="error_msg">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" id="password" name="password" required>

                <div class="reset">
                    <a href="{{ URL::to('forgot') }}" class="forgot">Forgot Your Password?</a>
                </div>

                <button class="loginbutton" type="submit">Login</button>

                <div class="or-separator"><i>or</i></div>
                <div class="social">
                    <div class="go"><i class="fab fa-google"></i>
                        <img src="{{ asset('images/Google.png') }}" class="social-logo" id="social-logo-go">
                        Continue with Google
                    </div>
                    <div class="fb"><i class="fab fa-facebook"></i>
                        <img src="{{ asset('images/Facebook.png') }}" class="social-logo" id="social-logo-fb">
                        Continue with Facebook
                    </div>
                </div>
                <div class="SizedBox"></div>
                <div class="SizedBox"></div>
                <p class="suggest">Don't have an account? <a href="{{ URL::to('signup') }}" class="sign">Sign up
                        here!</a></p>
            </form>
        </div>


    </div>

</body>

</html>
