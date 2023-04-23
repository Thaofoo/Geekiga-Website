<div class="navbar_container" id="navbar">
    <nav class="navbar_logged_off">
        <div class="navbar_logged_off_left">
            <a href="#top"><img src="{{ asset('images/GEEKIGA LOGO.png') }}" height="30px" draggable="false"></a>
        </div>
        <div class="navbar_logged_off_right">
            <a href="{{ URL::to('signup') }}" class="navbar_logged_off_right_signup">
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
<script src="{{ asset('js/scroll.js') }}"></script>
