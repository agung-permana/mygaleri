@extends('layouts.app')

@section('title', 'Tambah Data Album')

@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Data
        </div>
        <div class="card-body">
            <form action="{{ route('album.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Album</label>
                    <input type="text" class="form-control @error('nama_album') is-invalid @enderror" name="nama_album" value="{{ old('nama_album') }}">
                    @error('nama_album')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ url('/album') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection