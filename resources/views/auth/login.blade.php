@extends('auth.master')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="image/logo.jpg" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('login') }}" method="post">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                            placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="Password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>



                    <div class="text-center p-t-136">
                        <a href="{{ route('register') }}"
                            class="text-center">{{ __('Belum punya akun? Daftar sekarang') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
