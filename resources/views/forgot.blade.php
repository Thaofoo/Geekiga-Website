<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geekiga Login</title>
    <link rel="icon" type="png" href="/public/images/small-logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forgot.css') }}" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('interface_assets/tagline_bg.png')}}');">

    <div class="container">

        <div class="container-content1">
            <img src="/public/images/GEEKIGA LOGO.png" alt="Logo" class="img-content1" />
        </div>
        <div class="form">
            <form>
                <h3>Reset Your Password</h3>
                <p class="suggest">Please enter the email associated with your account and we'll send an email with
                    instructions to reset your password</p>
                <!-- <label for="username">Username</label> -->
                <div class="SizedBox"></div>

                <input type="text" placeholder="Email" id="username">
                <button>Send Email</button>
                <div class="SizedBox"></div>
                <p class="suggest">Didn't receive our email? <a href="#" class="resend">Resend</a></p>
                <div class="SizedBox"></div>
                <p class="suggest">Already have an account? <a href="{{ URL::to('login') }}" class="login">Login!</a></p>
            </form>
        </div>


    </div>

</body>
</html>
