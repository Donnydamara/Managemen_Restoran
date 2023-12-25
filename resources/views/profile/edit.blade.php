@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <h1 class="m-0 text-dark" style="text-align: center">Edit Profile</h1>

                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-body">

            <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 edit-foto-profile">

                        <div class="mb-3">
                            <label for="photo" class="custom-file-upload">
                                <img id="image-preview" src="{{ asset('image/profil/' . $user->photo_path) }}"
                                    alt="Profile Photo" class="rounded-circle"
                                    style="width: 300px; height: 300px; object-fit: cover;">
                                <span class="edit-icon" onclick="triggerFileInput()"><i
                                        class="fas fa-pencil-alt"></i></span>
                            </label>

                            <input id="photo" name="photo" type="file"
                                class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(this)"
                                style="display: none;">

                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>


                    </div>


                    <div class="col-md-4">
                        <label for="name">Nama</label>
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Full name" name="name" value="{{ $user->name }}" required
                                autocomplete="name" autofocus>
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" placeholder="Email" required
                                autocomplete="email">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Tambahkan input untuk data lain yang ingin diubah -->
                        <label for="no_hp">No Handphone</label>
                        <div class="input-group mb-3">
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" value="{{ $user->no_hp }}" placeholder="Phone Number" required>
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-phone"></span>
                            </div>
                        </div>
                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Tambahkan input untuk data lain yang ingin diubah -->
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-group mb-3">
                            <input id="tanggal_lahir" type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                value="{{ $user->tanggal_lahir }}" placeholder="Date of Birth" required>
                        </div>
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <!-- Tambahkan input untuk data lain yang ingin diubah -->
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <div class="input-group mb-3">
                            <input id="tempat_lahir" type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                value="{{ $user->tempat_lahir }}" placeholder="Place of Birth" required>
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-map-marker"></span>
                            </div>
                        </div>
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-group mb-3">
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm Password">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-block">Batal</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>

    </div>
    <!-- /.login-card-body -->

    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>

    <style>
        .edit-foto-profile {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Add your custom styles here */
        .custom -file-upload {
            cursor: pointer;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .custom-file-upload img {
            width: 100%;
            height: auto;
            display: block;
        }

        .custom-file-upload input[type="file"] {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }

        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #fff;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

        .edit-icon i {
            color: #007bff;
        }
    </style>
@endsection
