@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Pelajar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pelajar.index') }}">Pelajar</a></li>
                        <li class="breadcrumb-item active">Detail Pelajar</li>
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
                    <p>ID Jurusan: {{ $formattedDetailPelajar['id_jurusan'] }}</p>
                    <p>Nama Jurusan: {{ $formattedDetailPelajar['nama_jurusan'] }}</p>
                    <p>Email Pelajar: {{ $formattedDetailPelajar['email'] }}</p>
                    <!-- Tambahkan atribut lain jika diperlukan -->
                </div>
            </div>

            <!-- Tombol Kembali -->
            <a href="{{ route('pelajar.index') }}" class="btn btn-secondary">Kembali</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
