<?php

namespace App\Http\Controllers;

use App\Http\Services\MovieServiceInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movieService;

    public function __construct(MovieServiceInterface $movieService)
    {
        $this->movieService = $movieService;
    }

    public function movies(){
        throw new \Exception("Not implemented");
    }

    public function tvSeries(){
        throw new \Exception("Not implemented");
    }
    

    public function movieDetail(Request $request)
    {
        $movie_id = $request->route('movie_id');
        $movie = explode('__', $movie_id);
        return redirect()->away('https://www.google.com/search?q='.$movie[1]);
    }

    public function searchMovies(Request $request)
    {
        $query = $request->input('query');
        return redirect()->away('https://www.google.com/search?q='.$query);
    }
}
