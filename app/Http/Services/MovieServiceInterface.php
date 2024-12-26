<?php

namespace App\Http\Services;

interface MovieServiceInterface
{
    public function getMovieDetail(int $id): array;
    public function searchMovies(string $query): array;
    public function getPopularMovies(): array;
    public function getTopRatedMovies(): array;
    public function getNowPlayingMovies(): array;
}