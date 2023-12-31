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

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Content goes here -->

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box  bg-info">
                    <span class="info-box-icon"><img src="{{ asset('img/money-transfer.png') }}" alt="Logo"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Terbaru</span>
                        <span class="info-box-number">{{ $no_pesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-success">
                    <span class="info-box-icon "><img src="{{ asset('img/report.png') }}" alt="Logo"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Transaksi</span>
                        <span class="info-box-number">{{ $totalPesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-warning">
                    <span class="info-box-icon "><img src="{{ asset('img/menu.png') }}" alt="Logo"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Kategori Menu</span>
                        <span class="info-box-number">{{ $totalKategori }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box  bg-warning">
                    <span class="info-box-icon"><img src="{{ asset('img/fast-food.png') }}" alt="Logo"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Menu</span>
                        <span class="info-box-number">{{ $totalMenu }}</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title primary">Daftar Menu</h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nama Menu</th>
                                            <th>Deskripsi</th>
                                            <th>Harga (Rp.)</th> <!-- Perbaikan tag th -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($MenuData as $menu)
                                        <tr>
                                            <td>
                                                @if ($menu->image)
                                                <img src="{{ asset('/img/menu/' . $menu->image) }}" class="img-fluid " alt="Menu Photo" style="width: 70px; height: 70px; object-fit: cover;">
                                                @else
                                                No photo available
                                                @endif
                                            </td>
                                            <td>{{ $menu->nama_menu }}</td>
                                            <td>{{ $menu->deskripsi }}</td>
                                            <td class="text-right">{{ number_format ($menu->harga) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                            <h3 class="card-title secondary">Riwayat Transaksi</h3>
                            <div class="card-tools"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="transaksi-table">
                                    <thead>
                                        <tr>
                                            <th>No. Pesanan</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Subtotal (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TransaksiData as $transaksi)
                                        <tr class="text-center">
                                            <td>{{ $transaksi->no_pesanan }}</td>
                                            <td>{{ $transaksi->jenis_pesanan }}</td>
                                            <td>{{ $transaksi->jenis_pembayaran }}</td>
                                            <td>{{ date('d F Y', strtotime($transaksi->created_at)) }}</td>
                                            <td class="text-right">{{ number_format($transaksi->total_subtotal) }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>


    </div>
    <!-- /.container-fluid -->
</div>
<style>
    .info-box {
        cursor: pointer;
    }

    .info-box:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .info-box .info-box-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-box .info-box-content {
        text-align: center;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .info-box-text {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    .info-box-number {
        display: block;
        font-size: 24px;
        font-weight: bold;
        color: #000;
    }

    .info-box:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .info-box-icon img {
        width: 70px;
        height: auto;
    }

    .info-box-content {
        padding: 15px;
        text-align: center;
    }

    .col-md-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
</style>

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#data-table").DataTable({
            responsive: true, // Enable responsive mode
        });
    });
    $(document).ready(function() {
        $("#transaksi-table").DataTable({
            responsive: true, // Enable responsive mode
        });
    });
</script>
@endsection
<!-- /.content -->
@endsection