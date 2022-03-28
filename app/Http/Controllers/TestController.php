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
        $collection = collect($unsplash->photos->getResults());
        foreach ($collection->all() as $picture) {
            // var_dump($picture);
            // break;
            
            $result = DB::table('pictures')->insert([
                'alt_description'=> $picture['alt_description'],
                'urls' => json_encode($picture['urls']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo $result;
    }
}
