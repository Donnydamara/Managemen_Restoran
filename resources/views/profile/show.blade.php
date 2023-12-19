@extends('layouts.master')

@section('content')
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 img-container">
                <div class="square-border"></div>
                <img src="{{ asset('image/profil/' . $user->photo_path) }}" alt="Profile Picture"
                    class="img-fluid rounded-circle img-thumbnail foto-profile">
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
                                    <td><strong>Nommer HP</strong></td>
                                    <td>{{ $user->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Lahir</strong></td>
                                    <td>{{ $user->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tempat Lahir</strong></td>
                                    <td>{{ $user->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Posisi</strong></td>
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
                        <div class="row mt-3">
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-primary" onclick="showPasswordValidationForm()">Edit
                                    Profile</button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="passwordValidationForm" action="{{ route('profile.validate-password') }}" method="post"
                        data-edit-profile-url="{{ route('profile.edit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="validationPassword">Enter Your Password:</label>
                            <input type="password" class="form-control" id="validationPassword" name="validationPassword"
                                required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Censel</button>
                            <button type="submit" class="btn btn-primary">Validate Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        .img-container {
            position: relative;
            width: 350px;
            /* Sesuaikan dengan ukuran yang Anda inginkan */
            height: 350px;
            /* Sesuaikan dengan ukuran yang Anda inginkan */
            overflow: hidden;
            border-radius: 50%;
            /* Membuat gambar menjadi bulat */
            margin: 0 auto;
            /* Pusatkan gambar */
            margin-top: 60px;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .square-border {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            /* Warna border sesuaikan kebutuhan Anda */
            box-sizing: border-box;
            border-radius: 10px;
            /* Membuat border menjadi persegi */
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

        @media (max-width: 767px) {

            /* Styles for smartphones */
            .inf-content {
                margin-top: 15%;
            }
        }
    </style>

    <script>
        function showPasswordValidationForm() {
            // Show the password validation form container
            $('#passwordValidationContainer').show();

            // Optionally, you can trigger the modal here if needed
            $('#passwordValidationModal').modal('show');
        }

        $(document).ready(function() {
            // Reset form and handle submission
            $('#passwordValidationForm').submit(function(e) {
                e.preventDefault();

                // Perform your password validation logic here
                // If validation is successful, redirect to the edit profile page
                // Example using a hypothetical function validatePassword():
                if (validatePassword()) {
                    window.location.href = $('#passwordValidationForm').data('edit-profile-url');
                }
            });

            // Reset form saat modal ditutup
            $('#passwordValidationModal').on('hidden.bs.modal', function() {
                $('#passwordValidationForm').trigger('reset');
            });
        });

        // Hypothetical function to validate the password (replace with your logic)
        function validatePassword() {
            // Implement your password validation logic here
            // Return true if validation is successful, false otherwise
            return true;
        }
    </script>
    <!-- ... -->

    <!-- ... -->
@endsection
