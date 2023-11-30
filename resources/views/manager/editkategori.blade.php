@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Kategori Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Kategori Menu</li>
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
                <form action="{{ route('updateKategori', ['id' => $kategori->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $kategori->kategori }}" required="required" placeholder="Masukkan Kategori Menu">
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