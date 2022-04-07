<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        foreach ($collection->all() as $item) {
            foreach ($item['urls'] as $key => $url) {
                if ($key == 'full') {
                    Storage::disk('local')->put('images/' . $request->input('search') . '/' . sha1($url) . '.jpg', file_get_contents($url));
                }
            }

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
        return back()->with('search-success', 'Изображения найдены и успешно добавлены в БД!');
    }

    public function view()
    {
        $photos = [];
        foreach (Photo::all() as $photo) {
            $photos[] = json_decode($photo->urls);
        }
        return view('photos', compact('photos'));
    }
}
