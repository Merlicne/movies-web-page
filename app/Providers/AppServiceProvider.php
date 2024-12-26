<?php

namespace App\Providers;

use App\Http\ApiClient\implementation\TmdbApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TmdbApi::class, function($app){
            return new TmdbApi(
                config('api.tmdb.url'),
                config('api.tmdb.api_key'),
                config('api.tmdb.image_base_url')
            );
        });

        $this->app->bind('App\Http\ApiClient\TmdbClientInterface', 'App\Http\ApiClient\implementation\TmdbApi');
        $this->app->bind('App\Http\Services\MovieServiceInterface', 'App\Http\Services\implementation\MovieService');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
