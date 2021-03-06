@extends('layouts.app')

@section('title', 'Edit Data Galeri')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Data Galeri
        </div>
        <div class="card-body">
            <form action="{{ route('galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control @error('nama_galeri') is-invalid @enderror" name="nama_galeri" value="{{ old('nama_galeri', $galeri->nama_galeri) }}">
                    @error('nama_galeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Album</label>
                    <select name="album_id" class="form-control">
                        <option value="" hidden selected>-- Pilih Album --</option>
                        @foreach ($album as $item)
                        <option value="{{ $item->id }}"
                            @if ($item->id == $galeri->album_id)
                            selected
                            @endif
                        >{{ $item->nama_album }}</option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $galeri->keterangan) }}">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ url('/galeri') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection