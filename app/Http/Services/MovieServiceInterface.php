<?php

namespace App\Http\Services;

interface MovieServiceInterface
{
    public function getMovieDetail(int $id): array;
    public function searchMovies(string $query): array;
    public function getPopularMovies(int $page): array;
    public function getTopRatedMovies(int $page): array;
    public function getNowPlayingMovies(int $page): array;
}