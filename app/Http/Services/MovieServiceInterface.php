<?php

namespace App\Http\Services;

use App\Models\Movies;
use App\Models\Genres;

interface MovieServiceInterface
{
    public function getMovieDetail(int $id): Movies;
    public function searchMovies(string $query): array;
    public function getPopularMovies(): array;
    public function getTopRatedMovies(): array;
}