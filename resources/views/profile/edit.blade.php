@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">

            <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="text4" class="col-4 col-form-label">Foto</label>
                    <div class="col-8">
                        <input id="text4" name="photo" type="file"
                            class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if ($user->photo_path)
                            <div class="mt-2">
                                <img src="{{ asset('image/profil/' . $user->photo_path) }}" alt="Profile Photo"
                                    style="max-width: 100px;">
                            </div>
                        @else
                            <p>No photo available</p>
                        @endif
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Full name" name="name" value="{{ $user->name }}" required autocomplete="name"
                        autofocus>
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $user->email }}" placeholder="Email" required autocomplete="email">
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

                <!-- Tambahkan input untuk data lain yang ingin diubah -->
                <div class="input-group mb-3">
                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                        name="tempat_lahir" value="{{ $user->tempat_lahir }}" placeholder="Place of Birth" required>
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-map-marker"></span>
                    </div>
                </div>
                @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <label for="role" class="col-form-label">Role:</label>
                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Kasir</option>
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Manager</option>
                    </select>
                </div>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-block">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
