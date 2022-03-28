<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $unsplash = new UnsplashService();
        // echo '<pre>';
        // var_dump($unsplash->photos->getResults());
        // echo '</pre>';

        $collection = collect($unsplash->photos->getResults());
        foreach ($collection->all() as $picture) {
            var_dump($picture);
            break;
        }
    }
}
