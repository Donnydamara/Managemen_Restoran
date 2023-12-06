<!-- resources/views/layouts/master.blade.php -->

@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Your Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container">
            <div class="row inf-content">
                <div class="col-md-4 ">
                    <img src="{{ asset('image/profil/' . $user->photo_path) }}" style="width: 100%;" title="Profile Picture"
                        class="img-circle img-thumbnail isTooltip bold-image"
                        src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="User">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Information</h5>
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone Number</strong></td>
                                        <td>{{ $user->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date of Birth</strong></td>
                                        <td>{{ $user->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Place of Birth</strong></td>
                                        <td>{{ $user->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Role</strong></td>
                                        <td>
                                            @if ($user->role == 0)
                                                Admin
                                            @elseif ($user->role == 1)
                                                Manager
                                            @elseif ($user->role == 2)
                                                Kasir
                                            @else
                                                Undefined Role
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Update bagian tombol "Edit Profile" -->
                            <!-- Update bagian tombol "Edit Profile" -->
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#passwordValidationModal">Edit Profile</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="passwordValidationModal" tabindex="-1" role="dialog"
        aria-labelledby="passwordValidationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordValidationModalLabel">Password Validation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tambahkan action pada form modal -->
                    <form id="passwordValidationForm" action="{{ route('profile.validate-password') }}" method="post"
                        data-edit-profile-url="{{ route('profile.edit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="validationPassword">Enter Your Password:</label>
                            <input type="password" class="form-control" id="validationPassword" name="validationPassword"
                                required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Masuk Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .bold-image {
            border: 4px solid #000;
            /* Ubah warna dan lebar sesuai keinginan Anda */
        }

        .inf-content {
            border: 1px solid #DDDDDD;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        }
    </style>
    <!-- /.content-wrapper -->
    <!-- Tambahkan script ini setelah </style> -->
    <script>
        $(document).ready(function() {
            // Reset form saat modal ditutup
            $('#passwordValidationModal').on('hidden.bs.modal', function() {
                $('#passwordValidationForm').trigger('reset');
            });
        });
    </script>
@endsection
