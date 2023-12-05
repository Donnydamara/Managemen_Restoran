@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Menu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
    <div class="card-body">
        <form action="{{ route('updateMenu', ['id' => $menu->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Input untuk mengunggah gambar baru -->
            <div class="form-group">
                <label for="image">Ganti Gambar</label>
                <div>
                    @if($menu->image)
                    <img id="old-image" src="{{ asset('img/menu/' . $menu->image) }}" alt="Gambar Menu" style="max-width: 30%; margin-bottom: 10px;">
                    @else
                    <p>Tidak ada gambar</p>
                    @endif
                    <img id="image-preview" src="#" alt="Preview" style="max-width: 30%; margin-bottom:10px; display: none; ">
                </div>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(this)">
            </div>

            <div class="form-group">
                <label for="nama_menu">Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-control" required="required" value="{{ $menu->nama_menu }}" placeholder="Masukkan nama jurusan">
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                    @foreach ($kategori as $kt)
                    <option value="{{$kt->id}}" {{$kt->id == $menu->id_kategori ? 'selected' : ''}}>{{$kt->kategori}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" required="required" value="{{ $menu->harga }}" placeholder="Masukkan nama jurusan">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" required="required" placeholder="Masukkan Deskripsi">{{ $menu->deskripsi }}</textarea>
            </div>

            <div class="text-right">
                <a href="{{ route('manager.menu') }}" class="btn btn-outline-secondary mr-2" role="button"><b>Batal</b></a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

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