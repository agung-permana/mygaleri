@extends('layouts.app')

@section('title', 'Edit Data User')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Data
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" value="admin"
                            @if ($user->level == 'admin')
                                checked
                            @endif
                        >
                        <label class="form-check-label">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" value="operator"
                            @if ($user->level == 'operator')
                                checked
                            @endif
                        >
                        <label class="form-check-label">
                            Operator
                        </label>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label><small>*) jika password tidak diganti, kosongkan saja.</small></label>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ url('/user') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection