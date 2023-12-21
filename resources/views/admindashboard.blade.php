@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="info-box bg-info">
                    <span class="info-box-icon">
                        <img src="{{ asset('img/man.png') }}" alt="Logo">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number">{{ $totalUser }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-box bg-success">
                    <span class="info-box-icon">
                        <img src="{{ asset('img/history-book.png') }}" alt="Logo">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pesanan</span>
                        <span class="info-box-number">{{ $totalDetailPesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-box bg-warning">
                    <span class="info-box-icon">
                        <img src="{{ asset('img/menu.png') }}" alt="Logo">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Kategori Menu</span>
                        <span class="info-box-number">{{ $totalKategori }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-box bg-warning">
                    <span class="info-box-icon">
                        <img src="{{ asset('img/fast-food.png') }}" alt="Logo">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Menu</span>
                        <span class="info-box-number">{{ $totalMenu }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Jurusan Table -->
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title secondary">User Managemen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl-user">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Foto</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>No. Hp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($UserData as $User)
                                        <tr class="text-center">
                                            <td>
                                                @if ($User->photo_path)
                                                <img src="{{ asset('image/profil/' . $User->photo_path) }}" alt="Profile Photo" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                                @else
                                                No photo available
                                                @endif
                                            </td>
                                            <td>{{ $User->id }}</td>
                                            <td>{{ $User->name }}</td>
                                            <td>
                                                @if ($User->role == 1)
                                                Manager
                                                @elseif($User->role == 2)
                                                Kasir
                                                @else
                                                Undefined Role
                                                @endif
                                            </td>
                                            <td>{{ $User->no_hp }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- Mata Pelajaran Table -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Kategori Menu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl-kategori">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Kategori Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($KategoriData as $Kategori)
                                        <tr class="text-center">
                                            <td>{{ $Kategori->id }}</td>
                                            <td>{{ $Kategori->kategori }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Display Table for 'Pelajar' -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title success">Daftar Menu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl-menu">
                                    <thead>
                                        <tr class="text-center">
                                            <td>Foto</td>
                                            <td>Kategori</td>
                                            <td>Menu</td>
                                            <td>harga</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($MenuData as $Menu)
                                        <tr class="text-center">
                                            <td>
                                                @if ($Menu->image)
                                                <img src="{{ asset('/img/menu/' . $Menu->image) }}" class="img-fluid " alt="Menu Photo" style="width: 70px; height: 70px; object-fit: cover;">
                                                @else
                                                No photo available
                                                @endif
                                            </td>
                                            <td>{{ $Menu->kategori->kategori }}</td>
                                            <td>{{ $Menu->nama_menu }}</td>
                                            <td>Rp. {{ number_format($Menu->harga) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl-user, #tbl-kategori, #tbl-menu').DataTable();
    });
</script>

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
@endsection
@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection