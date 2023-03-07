<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>Geekiga - Geek Out With Geekiga</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
    </head>

    <body>
        <header>
            <h1>Geekiga - Geek Out With Geekiga</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="#">Categories</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="hero">
                <h2>Welcome to our streaming movie website</h2>
                <p>Stream the latest and greatest movies and TV shows right here.</p>
                <a href="#" class="btn">Start Watching Now</a>
            </section>

            <section class="popular-movies">
                <h2>Popular Movies</h2>
                <div class="movie-list">
                    <div class="movie">
                        <img src="movie1.jpg" alt="Movie Title">
                        <h3>Movie Title</h3>
                    </div>
                    <div class="movie">
                        <img src="movie2.jpg" alt="Movie Title">
                        <h3>Movie Title</h3>
                    </div>
                    <div class="movie">
                        <img src="movie3.jpg" alt="Movie Title">
                        <h3>Movie Title</h3>
                    </div>
                    <div class="movie">
                        <img src="movie4.jpg" alt="Movie Title">
                        <h3>Movie Title</h3>
                    </div>
                </div>
            </section>

            <section class="popular-tv">
                <h2>Popular TV Shows</h2>
                <div class="tv-list">
                    <div class="tv-show">
                        <img src="tv1.jpg" alt="TV Show Title">
                        <h3>TV Show Title</h3>
                    </div>
                    <div class="tv-show">
                        <img src="tv2.jpg" alt="TV Show Title">
                        <h3>TV Show Title</h3>
                    </div>
                    <div class="tv-show">
                        <img src="tv3.jpg" alt="TV Show Title">
                        <h3>TV Show Title</h3>
                    </div>
                    <div class="tv-show">
                        <img src="tv4.jpg" alt="TV Show Title">
                        <h3>TV Show Title</h3>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy; 2023 Streaming Movie Website. All rights reserved.</p>
        </footer>
    </body>
</html>
