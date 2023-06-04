        <div class="navbar_container" id="navbar">
            <nav class="navbar_logged_on">

                <div class="navbar_logged_on_left">
                    <a href="{{ URL::to('home') }}" class="navbar_logged_on_left_button {{ ($title === "Home") ? 'active_button' : '' }}" id="home_button">
                        <img src="{{ asset('interface_assets/Home.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text "> Home </div>
                    </a>

                    <a href="{{ URL::to('popular') }}" class="navbar_logged_on_left_button {{ ($title === "Popular") ? 'active_button' : '' }}" id="popular_button">
                        <img src="{{ asset('interface_assets/chart.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text"> Popular </div>
                    </a>

                    @if ($user->admin == 0)
                    <a href="{{ URL::to('watchlist') }}" class="navbar_logged_on_left_button {{ ($title === "Watch List") ? 'active_button' : '' }}" id="watchlist_button">
                        <img src="{{ asset('interface_assets/Watchlist.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text" > Watch List </div>
                    </a>
                    @endif


                    <a href="{{ URL::to('movies') }}" class="navbar_logged_on_left_button {{ ($title === "Movies") ? 'active_button' : '' }}" id="movies_button">
                        <img src="{{ asset('interface_assets/Movie.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text" > Movies </div>
                    </a>

                    @if ($user->admin == 1)
                    <a href="/admin" class="navbar_logged_on_left_button" id="admin_button">
                        <img src="{{ asset('interface_assets/back_door.svg') }}" height="16px">
                        <div class="navbar_logged_on_left_button_text" > Admin Panel </div>
                    </a>
                    @endif

                </div>

                <div class="navbar_logged_on_mid">
                    <a href="{{ URL::to('home') }}"><img src="{{ asset('images/GEEKIGA LOGO.png') }}" height="30px" draggable="false"></a>
                </div>

                <div class="navbar_logged_on_right">
                    <div class="search">
                        <form class="search_form" action="/search" method="POST">
                            @csrf
                            <input id="search_bar" class="search_hidden" placeholder="Search..." value="" name="keyword" >
                        </form>
                        <button id="searchButton" onclick="show_bar()"><img src="{{ asset('interface_assets/Search.svg') }}" height="18px"></button>
                    </div>
                    <img src="{{ asset('interface_assets/Dotmenu.svg') }}" height="18px" id="about_us_button" >
                    <a href="" id="about_us" onclick="show_about()" class="about_us_hide">About Us</a>
                    <a href="{{ URL::to('profile') }}">
                        <div class="navbar_logged_on_right_avatar">
                            @if ($user->image != null)
                            <img id="ppict" src="{{ asset('storage/images/profile/'.$user->image) }}">
                            @else
                            <img id="ppict" src="{{ asset('interface_assets/default.webp') }}">
                            @endif

                        </div>
                    </a>
                </div>
            </nav>
        </div>

        <script src="{{ asset("js/scroll.js") }}"></script>
        <script src="{{ asset("js/search_show.js") }}"></script>

