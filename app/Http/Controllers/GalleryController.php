<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery items.
     */
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('galeri.index', [
            'galleries' => $galleries,
        ]);
    }
}
