@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Kategori Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Kategori Menu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('storeKategori') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" required="required" placeholder="Masukkan Kategori Menu">
                    </div>

                    <div class="text-right">
                        <a href="{{ route('manager.kategori') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection