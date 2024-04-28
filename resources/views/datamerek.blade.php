@extends('layouts.maindashboard')

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Merek</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Merek</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Tambah Merek</a>
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                  <form action="{{ route('brands.index') }}" method="GET">
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="search" class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Merek</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td> <!-- Ganti ini dengan kolom yang berisi nama merek -->
                        <td>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                            <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#confirmDeleteModal{{ $brand->id }}"><i class="fas fa-trash"></i> Hapus</button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus merek ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection
