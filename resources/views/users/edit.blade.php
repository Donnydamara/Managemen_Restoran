@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <h2 class="login-box-msg">Update Data</h2>
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <label for="text4" class="col-4 col-form-label">Foto</label>
                        <div class="mb-3">
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
                                            class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                                    </div>
                                @else
                                    <p>No photo available</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="role" class="col-form-label">nama:</label>
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

                        <label for="role" class="col-form-label">Email:</label>
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
                        <label for="role" class="col-form-label">No Hp:</label>
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
                    </div>
                    <div class="col-md-4">
                        <!-- Tambahkan input untuk data lain yang ingin diubah -->
                        <label for="role" class="col-form-label">Tanggal Lahir:</label>
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
                        <label for="role" class="col-form-label">Tempat Lahir:</label>
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

                        <label for="role" class="col-form-label">Role:</label>
                        <div class="input-group mb-3">
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror"
                                required>
                                {{-- <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option> --}}
                                <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Kasir</option>
                                @if (Auth::user()->role != '1')
                                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Manager</option>
                                @endif
                            </select>
                        </div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-block">Cancel</a>
                        </div>
                        <div class="col-6">

                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
