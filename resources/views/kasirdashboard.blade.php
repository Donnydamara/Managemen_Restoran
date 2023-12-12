@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Kasir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard Kasir</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>
                        <p>No pesanan terbaru</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="?hal=transaksi_data" class="small-box-footer">Detail <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3></h3>
                        <p>Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="?hal=transaksi_data" class="small-box-footer">Detail <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Daftar Makanan</h3>
                        <div class="card-tools"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="nama" class="col-1 m-2">Kategori</label>
                                <select class="form-control select2 col-3">
                                    <option value="Semua">Semua Jenis</option>
                                    <option value="Makanan">Makanan</option>
                                    <!-- Add options if needed -->
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" name="proses" class="btn btn-primary btn-block">Cari</button>
                            </div>
                    </div>
                    </form>

                    <hr>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Deskripsi</th>
                                <th>Harga
                                <th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- Add table body if needed -->
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Content goes here -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
