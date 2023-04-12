        <div class="navbar_container" id="navbar">
            <nav class="navbar_logged_on">

                <div class="navbar_logged_on_left">
                    <a href="{{ URL::to('home') }}" class="navbar_logged_on_left_button {{ ($title === "Home") ? 'active_button' : '' }}" id="home_button">
                        <img src="{{ asset('interface_assets/Home.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text "> Home </div>

                    <a href="{{ URL::to('popular') }}" class="navbar_logged_on_left_button {{ ($title === "Popular") ? 'active_button' : '' }}" id="popular_button">
                        <img src="{{ asset('interface_assets/Chart.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text"> Popular </div>
                    </a>
                    <a href="{{ URL::to('watchlist') }}" class="navbar_logged_on_left_button {{ ($title === "Watch List") ? 'active_button' : '' }}" id="watchlist_button">
                        <img src="{{ asset('interface_assets/Watchlist.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text" > Watch List </div>
                    </a>

                </div>

                <div class="navbar_logged_on_mid">
                    <img src="{{ asset('images/GEEKIGA LOGO.png') }}" height="30px">
                </div>

                <div class="navbar_logged_on_right">
                    <img src="{{ asset('interface_assets/Search.svg') }}" height="18px">
                    <img src="{{ asset('interface_assets/Dotmenu.svg') }}" height="18px">
                    <a href="{{ URL::to('profile') }}">
                    <div class="navbar_logged_on_right_avatar"></div>
                    </a>
                </div>

            </nav>
        </div>
        <script src="{{ asset('js/scroll.js') }}"></script>
