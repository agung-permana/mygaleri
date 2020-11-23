@extends('layouts.app')

@section('title', 'Edit Data Album')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Data
        </div>
        <div class="card-body">
            <form action="{{ route('album.update', $album->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nama Album</label>
                    <input type="text" class="form-control @error('nama_album') is-invalid @enderror" name="nama_album" value="{{ old('nama_album', $album->nama_album) }}">
                    @error('nama_album')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <br><img src="{{ asset('images/'. $album->gambar) }}" style="width: 100px">
                </div>
                <div class="form-group">
                    <label>Ganti Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar', $album->gambar) }}">
                    <small>*) Apabila gambar tidak diganti, kosongkan saja.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ url('/album') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection