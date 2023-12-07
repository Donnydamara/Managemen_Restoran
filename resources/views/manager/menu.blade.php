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

<script>
    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            'title': 'Konfirmasi Hapus',
            'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
            'dangermode': true,
            'buttons': true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        })
    }
</script>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Daftar Menu</li>
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
                <a href="{{route('createMenu')}}" class="btn btn-success px-4" role="button"><i class="fa-solid fa-plus"></i> Tambah Menu</a>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>

                            <th style="width: 180px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $m)
                        <tr>
                            <td> {{ $loop->index + 1 }}</td>
                            <td>
                                @if ($m->image)
                                <img src="{{ asset('/img/menu/' . $m->image) }}" alt="Menu Photo" style="max-width: 200px;">
                                @else
                                No photo available
                                @endif
                            </td>
                            <td>
                                {{ $m->nama_menu }}
                            </td>
                            <td>
                                @if ($m->kategori)
                                {{ $m->kategori->kategori }}
                                @else
                                Kategori menu belum dimasukkan
                                @endif
                            </td>
                            <td> Rp. {{ number_format ($m->harga) }}</td>

                            <td style="width: 150px;" class="text-center">
                                <button type=" button" class="btn btn-primary btn-sm mb-2 px-5" data-toggle="modal" data-target="#menuDetailModal{{ $m->id }}">
                                    <i class="fa-solid fa-circle-info"></i> Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="menuDetailModal{{ $m->id }}" tabindex="-1" aria-labelledby="menuDetailModalLabel{{ $m->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="menuDetailModalLabel{{ $m->id }}">Detail Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="{{ asset('img/menu/' . $m->image) }}" alt="Gambar Menu" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-6" style="text-align: justify;">
                                                        <!-- Tempat untuk menampilkan detail menu -->
                                                        <p>Nama Menu: <span> {{ $m->nama_menu }}</span></p>
                                                        <p>Kategori: <span>
                                                                @if ($m->kategori)
                                                                {{ $m->kategori->kategori }}
                                                                @else
                                                                Kategori menu belum dimasukkan
                                                                @endif
                                                            </span></p>
                                                        <p>Harga: <span> {{ $m->harga }}</span></p>
                                                        <p>Deskripsi: <span> {{ $m->deskripsi }}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal-->

                                <a href="{{route('editMenu', ['id' => $m->id])}}" class="btn btn-warning btn-sm mb-2 px-3" role="button"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <a onclick="confirmDelete(this)" data-url="{{ route('deleteMenu', ['id' => $m->id]) }}" class="btn btn-danger btn-sm mb-2 px-2" role="button"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                            </td>
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