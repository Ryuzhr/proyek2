@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profil Pengguna</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Profil</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @if ($user->image)
            <div class="mb-3">
                <label for="current_image" class="form-label">Gambar Profil Saat Ini</label>
                <img src="{{ route('gambar.show', ['nama_file' => $user->image]) }}" alt="Gambar Profil" style="max-width: 200px;">
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
