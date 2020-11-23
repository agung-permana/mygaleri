<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Album;
use File;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $album = Album::all();
        return view('admin.album.index', compact('album'));
    }

    public function create()
    {
        return view('admin.album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required',
            'gambar' => 'required|image|mimes:jpeg, jpg, png'
        ]);

        $album = New Album;
        $album->nama_album = $request->nama_album;
        $album->album_seo = Str::slug($request->nama_album);
        
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('images/', $namafile);

        $album->gambar = $namafile;
        $album->save();
        return redirect('/album')->with('status', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $album = Album::find($id);
        return view('admin.album.edit', compact('album'));

    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if ($request->has('gambar')){
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('images/', $namafile);
            $album->gambar = $namafile;
        }else{
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);
        }
        $album->update();
        return redirect('/album')->with('status', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        $album = Album::find($id);
        $namafile = $album->gambar;
        File::delete('images/'.$namafile);
        $album->delete();
        return redirect('/album')->with('status', 'Data Berhasil Dihapus!');
    }
}
