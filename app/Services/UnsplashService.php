<?php

namespace App\Services;

use \Unsplash\HttpClient;
use \Unsplash\Search;

class UnsplashService
{

    public function __construct()
    {
        HttpClient::init([
            'applicationId' => env('UNSPLASH_ID'),
            'secret' => env('UNSPLASH_SECRET'),
            'utmSource' => env('UNSPLASH_UTM')
        ]);
    }

    public function searchPhoto($search, $page, $per_page, $orientation)
    {
        $photos = Search::photos($search, $page, $per_page, $orientation);

        return $photos;
    }

    public function test()
    {

    }
}
