@extends('layouts.master')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Omset Restoran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Omset Restoran</li>
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
            <div class="card-header text-left">
                <h5>Data Riwayat Pesanan</h5>
                <hr>
                <form action="{{ route('omset.filtersubmit') }}" method="POST">
                    @csrf
                    <div class="row pb-3">
                        <div class="col-md-3">
                            <label>Kategori:</label>
                            <select name="category" class="form-select">
                                <option value="">Pilih Kategori</option>
                                @foreach($menu as $m)
                                <option value="{{ $m->id_kategori }}">{{ $m->kategori->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tgl mulai : </label>
                            <input type="date" id="start_date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Tgl selesai : </label>
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>
                        <div class="col-md-2 pt-4">
                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fa fa-search"></i> Filter</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-body">
                <table class="table table-hover mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Tgl Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_pesanan as $rp)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                {{ $rp->nama_menu }}
                            </td>
                            <td>
                                {{ $rp->menu->kategori->kategori }}
                            </td>
                            <td> {{ $rp->jumlah }} </td>
                            <td> Rp. {{ number_format($rp->subtotal) }}</td>
                            <td> {{ $rp->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection