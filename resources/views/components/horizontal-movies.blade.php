<div class="horizontal-movies">
    <h2 class="mb-2 text-slate-800 text-xl font-semibold">{{ $title }}</h2>
    <div class="movies-container flex overflow-x-scroll pb-10">
        <div class="flex flex-nowrap">
            @foreach ($movies as $movie)
                <div class="movie-card inline-block px-3">
                    <div class="max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title']}}">
                        {{-- <img src="https://image.tmdb.org/t/p/original/{{ $movie['poster_path'] }}" alt="image"> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
