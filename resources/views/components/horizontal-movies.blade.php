<div class="horizontal-movies">
    <h2 class="mb-2 text-800 text-xl font-semibold">{{ $title }}</h2>
    <div class="movies-container">
        <div class="flex flex-nowrap">
            @foreach ($movies as $movie)
                <a href="https://www.google.com/search?q={{ $movie['title'] }}" class="movie-card px-3">
                    <div class="card-content">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" 
                             alt="{{ $movie['title'] }}" class="movie-poster">
                    </div>
                    <p class="movie-title">{{ $movie['title'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
