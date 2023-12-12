<!-- resources/views/layouts/master.blade.php -->

@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <h1 class="m-0 text-dark" style="text-align: center">Profile</h1>

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 ">
                    <div>
                        <img src="{{ asset('image/profil/' . $user->photo_path) }}" alt="Profile Picture"
                            class="img-fluid rounded-circle img-thumbnail foto-profile">
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="card inf-content">
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
        .foto-profile {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;

        }

        .bold-image {
            border: 4px solid #000;
        }

        .inf-content {
            margin-top: 5%;
            border: 1px solid #DDDDDD;
            border-radius: 10px;
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        }

        /* Additional styling for a more modern look */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-user-information td {
            border: none;
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
