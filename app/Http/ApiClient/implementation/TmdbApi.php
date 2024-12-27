<?php

namespace App\Http\ApiClient\implementation;

use App\Http\ApiClient\TmdbClientInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class TmdbApi implements TmdbClientInterface
{
    //* configuration
    private $url;
    private $imageBaseUrl;
    private $apiKey;
    private $client;

    public function __construct($url, $apiKey, $imageBaseUrl)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
        $this->imageBaseUrl = $imageBaseUrl;
        $this->client = new Client();
    }

    //* Abstraction

    public function getNowPlayingMovies(int $page): array
    {
        $params = [
            'page' => $page,
        ];
        return $this->get('/movie/now_playing',$params)['results'];
    }

    public function getMovieDetail(int $id): array
    {
        throw new \Exception("Not implemented");
    }

    public function searchMovies(string $query): array
    {
        throw new \Exception("Not implemented");
    }

    public function getPopularMovies($page): array
    {
        $params = [
            'page' => $page,
        ];
        return $this->get('/movie/popular',$params)['results'];
    }

    public function getTopRatedMovies($page): array
    {
        $params = [
            'page' => $page,
        ];
        return $this->get('/movie/top_rated',$params)['results'];

    }


    //* Implementation

    private function get($path, $params = [])
    {
        $response = $this->client->request("GET", $this->url . $path, [
            // "query" => $params,
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody(),true);
    }

    private function post($path, $params = [])
    {
        $response = $this->client->request("POST", $this->url . $path, [
            "form_params" => array_merge($params, ["api_key" => $this->apiKey]),
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents());
    }

    private function delete($path, $params = [])
    {
        $response = $this->client->request("DELETE", $this->url . $path, [
            "query" => array_merge($params, ["api_key" => $this->apiKey]),
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents());
    }

    private function getImageUrl($path, $size = "original")
    {
        return $this->imageBaseUrl . "/" . $size . "/" . $path;
    }


}
