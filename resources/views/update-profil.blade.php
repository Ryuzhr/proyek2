@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Profil</h1>
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="image">Gambar Profil</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update Profil</button>
        </form>
    </div>
@endsection
