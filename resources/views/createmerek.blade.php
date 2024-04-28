@extends('layouts.maindashboard')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Merek</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('brands.store') }}" method="POST">
                                @csrf
                                <!-- Isi formulir -->
                                <div class="form-group">
                                    <label for="name">Nama Merek:</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Merek">
                                </div>
                                <!-- Tambahkan input untuk kolom lain jika diperlukan -->
                                <button type="submit" class="btn btn-primary">Tambah Merek</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
