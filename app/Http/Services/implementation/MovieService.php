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

    public function getPopularMovies(): array
    {
        throw new \Exception("Not implemented");
    }

    public function getTopRatedMovies(): array
    {
        throw new \Exception("Not implemented");
    }

    public function getNowPlayingMovies(): array
    {
        return $this->tmdbClient->getNowPlayingMovies(1);
    }


}