<?php

namespace App\Http\Controllers;
use App\Models\Gallery;


class GalleryIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(4);
        return view('galleryIndex', compact('galleries'));
    }
}
