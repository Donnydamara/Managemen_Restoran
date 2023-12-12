@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kategori Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kategori Menu</li>
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
                    <a href="{{ route('createKategori') }}" class="btn btn-success" role="button"><i
                            class="fa-solid fa-plus"></i> Tambah Kategori Menu</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover mb-0" id="data-table" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kt)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{ $kt->kategori }}</td>
                                    <td>
                                        <a href="{{ route('editKategori', ['id' => $kt->id]) }}"
                                            class="btn btn-warning btn-sm m-2" role="button"><i
                                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <a onclick="confirmDelete(this)"
                                            data-url="{{ route('deleteKategori', ['id' => $kt->id]) }}"
                                            class="btn btn-danger btn-sm" role="button"><i
                                                class="fa-solid fa-trash-can"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data-table').DataTable();
        });

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
    <!-- /.content -->
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection
