<?php

namespace App\Http\Controllers;

use App\Http\ApiClient\implementation\TmdbApi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $tmdbClient;

    public function __construct(TmdbApi $tmdbClient)
    {
        $this->tmdbClient = $tmdbClient;
    }
    
    public function index(): View
    {
        $playingMovies = $this->tmdbClient->getNowPlayingMovies(1);
        return View('pages/index',[
            'playingMovies' => $playingMovies
        ]);
    }
}
