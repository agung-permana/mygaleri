@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>Data Album</strong>
            <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Koordinator</th>
                        <th>Nama Album</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_galeri }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->album->nama_album }}</td>
                            <td><img src="{{ asset('thumb/'. $item->gambar) }}"
                                style="width: 100px"></td>
                            <td width="180">
                                <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini?')" action="{{ route('galeri.delete', $item->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection