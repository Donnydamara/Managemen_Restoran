@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Menu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('storeMenu') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="image">Foto</label>
                        <img id="image-preview" src="#" alt="Preview" style="max-width: 30%; display: none; margin-bottom: 10px;">
                        <div class="input-group mb-3">
                            <input id="image-input" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(this)">

                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_menu">Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control" required="required" placeholder="Masukkan nama Menu">
                    </div>


                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                            @foreach ($kategori as $kt)
                            <option value="{{ $kt->id }}">{{ $kt->kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" required="required" placeholder="Masukkan Harga">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" required="required" placeholder="Masukkan Deskripsi"></textarea>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('manager.menu') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
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
        }
    }
</script>

@endsection