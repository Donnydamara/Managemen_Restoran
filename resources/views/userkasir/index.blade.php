@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Your main content goes here -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="m-0 text-dark">Daftar Akun</h1>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <div class="card-header text-right">
                                    <a href="{{ route('userkasir.create') }}" class="btn btn-success px-4" role="button"><i
                                            class="fa-solid fa-plus"></i>
                                        Tambah User
                                    </a>
                                </div>
                            </div>
                            <table class="table table-bordered" id="table-akun">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Tanggal Buat</th>
                                        <th>Tanggal Update</th>
                                        <th>Role</th>
                                        <th style="width: 250px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <td> {{ $loop->index + 1 }}</td>
                                            <td>
                                                @if ($user->photo_path)
                                                    <img src="{{ asset('image/profil/' . $user->photo_path) }}"
                                                        alt="Profile Photo" class="rounded-circle"
                                                        style="width: 200px; height: 200px; object-fit: cover;">
                                                @else
                                                    No photo available
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                                            <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                                            <td>
                                                @if ($user->role == 0)
                                                    Admin
                                                @elseif($user->role == 1)
                                                    Manager
                                                @elseif($user->role == 2)
                                                    Kasir
                                                @else
                                                    Undefined Role
                                                @endif
                                            </td>
                                            <td style="width: 200px; text-align: center;">
                                                <!-- button detail -->
                                                <button type="button" class="btn btn-primary mb-3 px-3" data-toggle="modal"
                                                    data-target="#detailModal{{ $user->id }}">
                                                    <i class="fa-solid fa-circle-info"></i>

                                                </button>
                                                <!-- Add the modal HTML block inside the loop -->
                                                <div class="modal fade" id="detailModal{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="detailModalLabel{{ $user->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailModalLabel{{ $user->id }}">
                                                                    Detail
                                                                    User: {{ $user->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th>No HP</th>
                                                                        <td>{{ $user->no_hp }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tanggal Lahir</th>
                                                                        <td>{{ $user->tanggal_lahir }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tempat Lahir</th>
                                                                        <td>{{ $user->tempat_lahir }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of modal HTML block -->
                                                <!-- button edit -->
                                                <a href="{{ route('userkasir.edit', ['user' => $user->id]) }}"
                                                    class="btn btn-warning mb-3 px-3">
                                                    <i class="fa-solid fa-pen-to-square"></i>

                                                </a>
                                                <form id="deleteForm" action="" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <!-- button hapus -->
                                                <a onclick="confirmDelete(this)"
                                                    data-url="{{ route('userkasir.destroy', ['user' => $user->id]) }}"
                                                    data-user-name="{{ $user->name }}" class="btn btn-danger mb-3 px-3">
                                                    <i class="fa-solid fa-trash-can"></i>

                                                </a>

                                                <a href="{{ route('userkasir.resetPassword', ['id' => $user->id]) }}"
                                                    class="btn btn-info mb-3 px-3">
                                                    <i class="fa fa-refresh"></i>
                                                    Reset Password
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-akun').DataTable();
        });

        function confirmDelete(button) {
            var url = $(button).data('url');
            var userName = $(button).data('user-name');
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Kamu Yakin Ingin Menghapus Akun ' + userName + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            });
        }
    </script>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection
