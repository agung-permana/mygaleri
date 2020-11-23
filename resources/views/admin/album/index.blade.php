@extends('layouts.app')

@section('title', 'Album')

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
            <a href="{{ route('album.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Album</th>
                        <th>Url SEO</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($album as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_album }}</td>
                            <td>{{ $item->album_seo }}</td>
                            <td><img src="{{ asset('images/'. $item->gambar) }}"
                                style="width: 100px"></td>
                            <td width="180">
                                <a href="{{ route('album.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini?')" action="{{ route('album.delete', $item->id) }}" method="post">
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