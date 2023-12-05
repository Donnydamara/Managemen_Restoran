@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Profile</h1>
            </div><!-- /.col -->
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

            <div class="form-group">
                <label for="text4">Foto</label>
                <div>
                    @if ($user->photo_path)

                    <img id="old-image" src="{{ asset('image/profil/' . $user->photo_path) }}" alt="Profile Photo" style="max-width: 30%; margin-bottom: 10px;">

                    @else
                    <p>Tidak ada gambar</p>
                    @endif
                    <img id="image-preview" src="#" alt="Preview" style="max-width: 30%; margin-bottom:10px; display: none; ">
                </div>
                <input id="text4" name="photo" type="file" class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(this)">
                @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <label for="name">Nama</label>
            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Email" required autocomplete="email">
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
                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $user->no_hp }}" placeholder="Phone Number" required>
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
                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" placeholder="Date of Birth" required>
            </div>
            @error('tanggal_lahir')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <!-- Tambahkan input untuk data lain yang ingin diubah -->
            <label for="tempat_lahir">Tempat Lahir</label>
            <div class="input-group mb-3">
                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ $user->tempat_lahir }}" placeholder="Place of Birth" required>
                <div class="input-group-append input-group-text">
                    <span class="fa fa-map-marker"></span>
                </div>
            </div>
            @error('tempat_lahir')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-group mb-3">
                <label for="role">Role </label>
                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value=" @if ($user->role == 0)Admin @elseif($user->role == 1)Manager @elseif($user->role == 2)Kasir @else Role tidak terdefinisikan @endif" placeholder="role" readonly>
            </div>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="text-right">
                <a href="{{ route('profile.show') }}" class="btn btn-secondary ">Batal</a>
                <button type="submit" class="btn btn-primary ">Simpan</button>
            </div>
    </div>
    </form>

</div>
<!-- /.login-card-body -->

<script>
    function previewImage(input) {
        var preview = document.getElementById('image-preview');
        var oldImage = document.getElementById('old-image');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            oldImage.style.display = 'none';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    }
</script>
@endsection