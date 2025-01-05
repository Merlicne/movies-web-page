<?php

namespace Tests\Unit;

use App\Http\Utility\ModelConverter;
use App\Models\Genre;
use App\Models\Movie;
use PHPUnit\Framework\TestCase;

class ModelConverterTest extends TestCase
{
    private $movieJson;
    private $movieData;
    private $movieJsonArray;
    private $movieDataArray;

    public function setup(): void
    {
        parent::setUp();
        $this->movieJson = '{
            "adult": false,
            "backdrop_path": "/cjEcqdRdPQJhYre3HUAc5538Gk8.jpg",
            "genre_ids": [
            28,
            14,
            35
            ],
            "id": 845781,
            "original_language": "en",
            "original_title": "Red One",
            "overview": "After Santa Claus (codename: Red One) is kidnapped, the North Pole\'s Head of Security must team up with the world\'s most infamous tracker in a globe-trotting, action-packed mission to save Christmas.",
            "popularity": 5982.016,
            "poster_path": "/cdqLnri3NEGcmfnqwk2TSIYtddg.jpg",
            "release_date": "2024-10-31",
            "title": "Red One",
            "video": false,
            "vote_average": 7.012,
            "vote_count": 1422
            }';
        $this->movieData = new Movie([
            'title' => 'Red One',
            'overview' => 'After Santa Claus (codename: Red One) is kidnapped, the North Pole\'s Head of Security must team up with the world\'s most infamous tracker in a globe-trotting, action-packed mission to save Christmas.',
            'original_language' => 'en',
            'original_title' => 'Red One',
            'poster_path' => '/cdqLnri3NEGcmfnqwk2TSIYtddg.jpg',
            'backdrop_path' => '/cjEcqdRdPQJhYre3HUAc5538Gk8.jpg',
            'adult' => false,
            'video' => false,
            'popularity' => 5982.016,
            'vote_average' => 7.012,
            'vote_count' => 1422,
            'release_date' => '2024-10-31',
            'genre_ids' => [28, 14, 35]
        ]
        );
        $this->movieDataArray = [$this->movieData];
        $this->movieJsonArray = '[' . $this->movieJson . ']';

    }

    public function test_convert_json_to_Movie_model(): void
    {
        $movieData = json_decode($this->movieJson, true);
        $movieModel = ModelConverter::convertJsonToMovieModel($movieData);
        $this->assertEquals($this->movieData, $movieModel);
    }

    public function test_convert_json_to_Movie_model_array(): void
    {
        $movieData = json_decode($this->movieJsonArray, true);
        $movieModels = ModelConverter::convertJsonToMovieModelArray($movieData);
        $this->assertEquals($this->movieDataArray, $movieModels);
    }
    
}
