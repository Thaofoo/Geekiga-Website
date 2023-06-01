<div class="sidebar">

    <div class="logo">
        <a class="logo-img" href="{{ URL::to('/admin/home') }}"><img src="{{ asset('images/GEEKIGA LOGO.png') }}" height="30px" draggable="false"></a>
    </div>
    <div class="profile">

        <div class="profile-name">Admin Panel</div>

    </div>

    <hr class="profile-hr">

    <div class="title">MENU</div>
    <div class="buttons">
        <div>
            <a class="home-button side-button {{ ($title === "Home") ? 'active_button' : '' }}" href="{{ URL::to('/admin/home') }}">
                <img src="{{ asset('interface_assets/Home.svg') }}" height="16px">
                <p>Home</p>
            </a>
            <a class="movies-button side-button {{ ($title === "Movies") ? 'active_button' : '' }}" href="{{ URL::to('/admin/movies') }}">
                <img src="{{ asset('interface_assets/Movie.svg') }}" height="16px">
                <p>Movies</p>
            </a>
            <a class="popular-button side-button {{ ($title === "Popular") ? 'active_button' : '' }}" href="{{ URL::to('/admin/popular') }}">
                <img src="{{ asset('interface_assets/chart.svg') }}" height="16px">
                <p>Popular</p>
            </a>
            <a class="genre-button side-button {{ ($title === "Genre") ? 'active_button' : '' }}" href="{{ URL::to('/admin/genre') }}">
                <img src="{{ asset('interface_assets/genre.svg') }}" height="16px">
                <p>Genre</p>
            </a>
        </div>
        <a class="genre-button side-button" href="{{ URL::to('/') }}">
            <img src="{{ asset('interface_assets/back_door.svg') }}" height="16px">
            <p>Client Side</p>
        </a>
    </div>

</div>
