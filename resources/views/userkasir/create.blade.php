@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <h2 class="login-box-msg">Tambah User Baru</h2>

            <form action="{{ route('userkasir.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="input-group mb-3">
                    <input id="text4" name="photo" type="file"
                        class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(this)">
                    <img id="image-preview" src="#" alt="Preview" style="max-width: 20%; display: none;">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="input-group mb-3">
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                        name="no_hp" value="{{ old('no_hp') }}" placeholder="Nomor HP" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="tanggal_lahir" type="date"
                        class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" required>
                    <div class="input-group-append">

                    </div>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                        name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required>
                    <div class="input-group-append">
                        <div class="input-group-append input-group-text">
                            <span class="fa fa-map-marker"></span>
                        </div>
                    </div>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                        {{-- <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Admin</option> --}}
                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Kasir</option>
                        @if (Auth::user()->role != '1') 
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Manager</option>
                        @endif
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Ulangi password"
                        name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
@endsection
