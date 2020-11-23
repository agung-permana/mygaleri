<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class GuestController extends Controller
{
    public function index()
    {
        $album = Album::all();
        return view('welcome', compact('album'));
    }

    public function galeriFoto($title)
    {
        $album = Album::where('album_seo', $title)->first();
        $galeri = $album->photos()->orderBy('id', 'desc')->paginate(6);
        return view('galeri', compact('album', 'galeri'));
    }
}
