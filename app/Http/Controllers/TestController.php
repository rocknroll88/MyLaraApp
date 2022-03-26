<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnsplashService;

class TestController extends Controller
{
    public function index()
    {
        $test = new UnsplashService();
        var_dump($test->photos);
    }
}
