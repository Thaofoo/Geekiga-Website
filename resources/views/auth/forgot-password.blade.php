<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geekiga Forgot Password</title>
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
            <form method="post" action="/forgot-password">
                @csrf
                <h3>Reset Your Password</h3>

                <p class="suggest">Please enter the email associated with your account and we'll send an email with
                    instructions to reset your password</p>

                    @if(session('status'))
                    <p class="alert alert-success email-alert suggest" role="alert">
                        {{ session('status') }}
                    </p>
                    @endif
                <!-- <label for="username">Username</label> -->
                <div class="SizedBox"></div>

                <input type="email" placeholder="Email" id="email" name="email">
                <button type="submit">Send Email</button>

                <div class="SizedBox"></div>
                <div class="SizedBox"></div>
                <p class="suggest">Didn't receive our email? <a href="#" class="resend">Resend</a></p>


            </form>
        </div>


    </div>

</body>

</html>
