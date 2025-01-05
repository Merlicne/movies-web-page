<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: url({{ asset('/images/bg/hill-cloud.jpg')}}) no-repeat center center fixed; background-size: cover;">
<body>

    @include('commonviews.naviagator-bar')
    <div class="page-body text-white font-semibold gap-y-1" >
        {{-- Now Playing Movies --}}
        @include('components.horizontal-movies', ['title' => 'Now Playing Movies', 'movies' => $playingMovies])
        {{-- Popular Movies --}}
        @include('components.horizontal-movies', ['title' => 'Popular Movies', 'movies' => $popularMovies])
        {{-- Top Rated Movies --}}
        @include('components.horizontal-movies', ['title' => 'Top Rated Movies', 'movies' => $topRatedMovies])

    </div>

    

</body>
</html>
