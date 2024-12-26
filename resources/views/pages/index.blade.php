<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('commonviews.naviagator-bar')
    <div class="page-body">
        
        @include('components.horizontal-movies', ['title' => 'Now Playing Movies', 'movies' => $playingMovies])

    </div>

    

</body>
</html>
