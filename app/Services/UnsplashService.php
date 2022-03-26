<?php

namespace App\Services;

use \Unsplash\HttpClient;
use \Unsplash\Search;

class UnsplashService
{
    public $photos;

    public function __construct()
    {
        HttpClient::init([
            'applicationId'    => 'Seqxf62s--OjruqzEE4rByhKkdLDQoW6b3Giw0Juyro',
            'secret'    => 'B0Ku6OaL1zLZRJ9dpM9kIg6KUrpuH7E7FvNTVKP8JhE',
            'utmSource' => 'wallfun'
        ]);

        $search = 'bmw';
        $page = 3;
        $per_page = 15;
        $orientation = 'landscape';
        $this->photos = Search::photos($search, $page, $per_page, $orientation);

    }


    public function testFunc()
    {
        
    }
}
