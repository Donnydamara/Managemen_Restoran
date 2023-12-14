@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Riwayat Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Riwayat Transaksi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        {{-- main content here --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Riwayat Transaksi</h5>
                        <hr>
                        <form action="{{ route('transaksi.filtersubmit') }}" method="POST">
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-3">
                                    <input type="date" class="form-control" id="filter" name="filter" placeholder="filter">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                        Filter Tanggal
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="data-table">
                        <thead>
                            <tr style="background-color: #2c3e50; color: white;">
                                <th>No. Pesanan</th>
                                <th>Jenis Pesanan</th>
                                <th>Jenis Pembayaran</th>
                                <th>User</th>
                                <th>Tanggal Transaksi</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $grandTotal = 0;
                            @endphp

                            @foreach ($pesanan as $pesanans)
                            <tr>
                                <td> {{ $pesanans->no_pesanan }} </td>
                                <td> {{ $pesanans->jenis_pesanan }} </td>
                                <td> {{ $pesanans->jenis_pembayaran }} </td>
                                <td> {{ $pesanans->name }} </td>
                                <td> {{ date('d F Y', strtotime($pesanans->created_at))  }} </td>
                                <td>Rp. {{ number_format($pesanans->total_subtotal) }} </td>
                            </tr>
                            @php
                            $grandTotal += $pesanans->total_subtotal;
                            @endphp

                            @endforeach

                            <tr style="background-color: #2c3e50; color: white;">
                                <th colspan="5">Grand Total</th>
                                <td>Rp. {{ number_format($grandTotal) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection