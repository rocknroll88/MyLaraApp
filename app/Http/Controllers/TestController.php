<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

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
            // dd($picture['urls']);
            // DB::table('pictures')->insert([
            //     'alt_description' => $picture['alt_description'],
            //     'urls' => json_encode($picture['urls']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            foreach ($picture['urls'] as $image) {
                Storage::disk('local')->put(sha1($image) . '.jpg', file_get_contents($image));
                // $contents = file_get_contents($image);
                // dd($image);
                // $name = substr($image, strrpos($image, '/') + 1);
                // Storage::put($name, $contents);
            }
        }

        // return redirect('dashboard');
    }
}
