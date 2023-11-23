@extends('auth.master')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Register') }}</p>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name"
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
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                        placeholder="Nomor HP" name="no_hp" value="{{ old('no_hp') }}" required>
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-phone"></span>
                    </div>
                </div>
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="tanggal_lahir" type="date"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}" required>
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
                @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                        placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
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
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Manager</option>
                        <option value="2" {{ old('role', 2) == 2 ? 'selected' : '' }}>Kasir</option>
                    </select>
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-user"></span>
                    </div>
                </div>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password" required autocomplete="new-password">
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Retype password"
                        name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append input-group-text">
                        <span class="fa fa-lock"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if (Route::has('login'))
                <hr>
                <p class="mb-0 text-center">
                    <a href="{{ route('login') }}" class="text-center">{{ __('Sudah punya akun? Login sekarang') }}</a>
                </p>
            @endif
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
