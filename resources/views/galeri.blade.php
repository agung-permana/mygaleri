@extends('layouts.app')

@section('title', 'Album')

@section('content')
    <section class="bg-light">
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <h2 class="mt-3">Album: {{ $album->nama_album }}</h2>
          </div>
        </div>

        <div class="row">
            @foreach ($galeri as $item)
            <div class="col-md-4">
                <div class="card mt-4">
                  <a href="{{ asset('images/'.$item->gambar) }}"
                    data-lightbox="image-1" data-title="{{ $item->keterangan }}">
                    <img src="{{ asset('images/'.$item->gambar)}}" class="card-img-top" alt="" style="height: 230px">
                    </a>
                    <div class="card-body">
                        <h6 class="card-text">{{ $item->nama_album }}</h6>
                        <p>{{ $item->nama_galeri }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
      </div>
    </section>
@endsection