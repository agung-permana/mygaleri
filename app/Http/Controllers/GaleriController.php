<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Album;
use Auth;
use File;
use Image;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $galeri = Galeri::orderBy('id', 'desc')->paginate(5);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        $album = Album::all();
        return view('admin.galeri.create', compact('album'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg, jpg, png'
        ]);

        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->album_id = $request->album_id;
        $galeri->user_id = Auth::id();

        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        
        Image::make($gambar)->resize(280,230)->save('thumb/'.$namafile);
        $gambar->move('images/', $namafile);

        $galeri->gambar = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('status', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $album = Album::all();
        $galeri = Galeri::find($id);
        return view('admin.galeri.edit', compact('galeri', 'album'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::find($id);
        if ($request->has('gambar')) {
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan = $request->keterangan;
            $galeri->album_id = $request->album_id;

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            
            Image::make($gambar)->resize(280,230)->save('thumb/'.$namafile);
            $gambar->move('images/', $namafile);
            $galeri->gambar = $namafile;
        } else {
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan = $request->keterangan;
            $galeri->album_id = $request->album_id;
        }
        
        $galeri->update();
        return redirect('/galeri')->with('status', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        $galeri = Galeri::find($id);
        $namafile = $galeri->gambar;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $galeri->delete();
        return redirect('/galeri')->with('status', 'Data Berhasil Dihapus!');
    }
}
