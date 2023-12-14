@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
    @endif

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
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number">{{ $totalUser }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pesanan</span>
                            <span class="info-box-number">{{ $totalDetailPesanan }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-burger"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Katgori Menu</span>
                            <span class="info-box-number">{{ $totalKategori }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Managemen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                                    <img src="{{ asset('image/profil/' . $User->photo_path) }}"
                                                        alt="Profile Photo" class="rounded-circle"
                                                        style="width: 100px; height: 100px; object-fit: cover;">
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- Mata Pelajaran Table -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori Menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- Display Table for 'Pelajar' -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="tbl-menu">
                                <thead>
                                    <tr class="text-center">
                                        <td>Foto</td>
                                        <td>id_kategori</td>
                                        <td>Menu</td>
                                        <td>harga</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($MenuData as $Menu)
                                        <tr class="text-center">
                                            <td>
                                                @if ($Menu->image)
                                                    <img src="{{ asset('/img/menu/' . $Menu->image) }}" class="img-fluid "
                                                        alt="Menu Photo"
                                                        style="width: 70px; height: 70px; object-fit: cover;">
                                                @else
                                                    No photo available
                                                @endif
                                            </td>
                                            <td>{{ $Menu->kategori->kategori }}</td>
                                            <td>{{ $Menu->nama_menu }}</td>
                                            <td>{{ $Menu->harga }}</td>
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

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl-user, #tbl-kategori, #tbl-menu').DataTable({
                responsive: true,
                scrollY: '50vh',
                scrollCollapse: true,
            });
        });
    </script>
    <style>
        .img-dashboard {
            text-align: center;
        }
    </style>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection
