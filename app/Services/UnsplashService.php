<?php

namespace App\Services;

use \Unsplash\HttpClient;
use \Unsplash\Search;

class UnsplashService
{

    public function __construct()
    {
        HttpClient::init([
            'applicationId' => 'Seqxf62s--OjruqzEE4rByhKkdLDQoW6b3Giw0Juyro',
            'secret' => 'B0Ku6OaL1zLZRJ9dpM9kIg6KUrpuH7E7FvNTVKP8JhE',
            'utmSource' => 'wallfun'
        ]);
    }

    public function searchPhoto($search, $page, $per_page, $orientation)
    {
        $photos = Search::photos($search, $page, $per_page, $orientation);

        return $photos;
    }
}
