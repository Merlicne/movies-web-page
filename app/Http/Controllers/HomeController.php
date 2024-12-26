<?php

namespace App\Http\Controllers;

use App\Http\ApiClient\implementation\TmdbApi;
use App\Http\Services\MovieServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $movieService;

    public function __construct(MovieServiceInterface $movieService)
    {
        $this->movieService = $movieService;
    }
    
    public function index(): View
    {
        $playingMovies = $this->movieService->getNowPlayingMovies();
        return View('pages/index',[
            'playingMovies' => $playingMovies
        ]);
    }
}
