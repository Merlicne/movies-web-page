<?php

namespace App\Http\Services\implementation;

use App\Http\ApiClient\TmdbClientInterface;
use App\Http\Services\MovieServiceInterface;

class MovieService implements MovieServiceInterface{

    private $tmdbClient;

    public function __construct(TmdbClientInterface $tmdbClient)
    {
        $this->tmdbClient = $tmdbClient;
    }

    public function getMovieDetail(int $id): array
    {
        throw new \Exception("Not implemented");
    }

    public function searchMovies(string $query): array
    {
        throw new \Exception("Not implemented");
    }

    public function getPopularMovies(int $page): array
    {
        return $this->tmdbClient->getPopularMovies($page);
    }

    public function getTopRatedMovies(int $page): array
    {
        return $this->tmdbClient->getTopRatedMovies($page);
    }

    public function getNowPlayingMovies(int $page): array
    {
        return $this->tmdbClient->getNowPlayingMovies($page);
    }


}