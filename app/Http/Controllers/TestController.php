<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TestController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }


    public function store(Request $request)
    {
        $unsplash = new UnsplashService();
        $result = $unsplash->searchPhoto($request->input('search'), $request->input('page'), $request->input('per_page'), $request->input('orientation'));
        $collection = collect($result->getResults());
        foreach ($collection->all() as $picture) {
            DB::table('pictures')->insert([
                'alt_description' => $picture['alt_description'],
                'urls' => json_encode($picture['urls']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect('dashboard');
    }
}
