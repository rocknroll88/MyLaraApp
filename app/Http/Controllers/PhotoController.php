<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Log::info($input);
        $unsplash = new UnsplashService();
        $result = $unsplash->searchPhoto($request->input('search'), $request->input('page'), $request->input('per_page'), $request->input('orientation'));
        $collection = collect($result->getResults());
        foreach($collection->all() as $item)
        {
            $photo = new Photo();
            $photo->id = $item['id'];
            $photo->width = $item['width'];
            $photo->height = $item['height'];
            $photo->color = $item['color'];
            $photo->description = $item['description'];
            $photo->alt_description = $item['alt_description'];
            $photo->urls = json_encode($item['urls']);
            $photo->created_at = now();
            $photo->updated_at = now();

            $photo->save();
        }

            //Storage::disk('local')->put(sha1($image) . '.jpg', file_get_contents($image));
        return back();
    }
}
