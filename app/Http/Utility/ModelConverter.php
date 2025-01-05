<?php

namespace App\Http\Utility;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Container\Attributes\DB;
use InvalidArgumentException;
use Spatie\Async\Pool;
use Throwable;

class ModelConverter
{
    public static function convertJsonToMovieModel(array $movieData): Movie
    {

        $pool = Pool::create();
        $movieModel = new Movie(
            [
                'title' => $movieData['title'],
                'overview' => $movieData['overview'],
                'original_language' => $movieData['original_language'],
                'original_title' => $movieData['original_title'],
                'poster_path' => $movieData['poster_path'],
                'backdrop_path' => $movieData['backdrop_path'],
                'adult' => $movieData['adult'],
                'video' => $movieData['video'],
                'popularity' => $movieData['popularity'],
                'vote_average' => $movieData['vote_average'],
                'vote_count' => $movieData['vote_count'],
                'release_date' => $movieData['release_date'],
                'genre_ids' => $movieData['genre_ids'],
            ]
        );
    

        return $movieModel;
    }

    public static function convertJsonToMovieModelArray(array $movieData): array
    {
        $movieModels = [];
        foreach ($movieData as $movie) {
            $movieModels[] = self::convertJsonToMovieModel($movie);
        }
        return $movieModels;
    }
}
