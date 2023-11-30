@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0 text-dark">Daftar Akun</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="card-header text-right">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary" role="button">
                                        Tambah User
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-akun">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Tanggal Buat</th>
                                            <th>Tanggal Update</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    @if ($user->photo_path)
                                                        <img src="{{ asset('image/profil/' . $user->photo_path) }}"
                                                            alt="Profile Photo" style="max-width: 200px;">
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
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#detailModal{{ $user->id }}">
                                                        Detail
                                                    </button>
                                                    <!-- Add the modal HTML block inside the loop -->
                                                    <div class="modal fade" id="detailModal{{ $user->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="detailModalLabel{{ $user->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detailModalLabel{{ $user->id }}">Detail
                                                                        User: {{ $user->name }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
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
                                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                        class="btn btn-info">
                                                        Update
                                                    </a>
                                                    <form id="deleteForm" action="" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                        data-user-name="{{ $user->name }}" class="btn btn-danger">
                                                        Delete
                                                    </a>

                                                    <a href="{{ route('users.resetPassword', ['id' => $user->id]) }}"
                                                        class="btn btn-warning">
                                                        Reset Password
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-akun').DataTable();
        });

        function confirmDelete(element) {
            var url = element.getAttribute('data-url');
            var userName = element.getAttribute('data-user-name');

            if (confirm('Are you sure you want to delete ' + userName + '?')) {
                // Set the form action and submit the form
                document.getElementById('deleteForm').action = url;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endsection
<script>
    function confirmDelete(element) {
        var url = element.getAttribute('data-url');
        var userName = element.getAttribute('data-user-name');

        if (confirm('Are you sure you want to delete ' + userName + '?')) {
            // Set the form action and submit the form
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteForm').submit();
        }
    }
</script>
