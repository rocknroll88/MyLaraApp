<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UnsplashService;
use Unsplash\OAuth2\Client\Provider\Unsplash;

class UnsplashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UnsplashService::class, function(){
            return new UnsplashService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
