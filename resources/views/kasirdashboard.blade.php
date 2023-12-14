
@extends('layouts.master')

@section('content')
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
    
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-concierge-bell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi Terbaru</span>
                            <span class="info-box-number"></span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Transaksi</span>
                            <span class="info-box-number"></span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-burger"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Kategori Menu</span>
                            <span class="info-box-number"></span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Menu</span>
                            <span class="info-box-number"></span>
                        </div>
                    </div>
                </div>
            </div>

    <section class="content">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Daftar Makanan</h3>
                        <div class="card-tools"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="nama">Kategori</label>
                                <select class="form-control select2 col-3">
                                    <option value="Semua">Semua Jenis</option>
                                    <option value="Makanan">Makanan</option>
                                    <!-- Add options if needed -->
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-2">
                                    <button type="submit" name="proses" class="btn btn-primary btn-block">Cari</button>                                
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th> <!-- Perbaikan tag th -->
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
        <!-- Card Kedua -->
        <div class="col-12 col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title secondary">Riwayat Transaksi Hari Ini</h3>
                    <div class="card-tools"></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="data-table">
                        <thead>
                            <tr style="background-color: #2c3e50; color: white;">
                                <th>No. Pesanan</th>
                                <th>Jenis Pesanan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Tanggal Transaksi</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
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
