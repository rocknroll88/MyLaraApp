<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function index(){
        echo 'test test test';
    }
}
