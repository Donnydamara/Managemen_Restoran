@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tentang Restoran Kami</h1>
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
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('css/image/restoran.jpeg')}}" alt="restoran" style="width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <h3>Sejarah</h3>
                        <p>Restoran kami didirikan pada tahun 1990 oleh John Doe. Sejak itu, kami telah berkomitmen untuk
                            menyajikan makanan berkualitas tinggi dan layanan terbaik kepada pelanggan kami. Dengan berbagai
                            macam hidangan lezat, restoran kami telah menjadi tempat favorit bagi banyak orang untuk menikmati
                            hidangan berkualitas tinggi dalam lingkungan yang nyaman dan ramah.</p>
                        <h3>Visi dan Misi</h3>
                        <p>Visi kami adalah untuk menjadi restoran terdepan dalam menyajikan masakan berkualitas tinggi dengan
                            pelayanan yang luar biasa kepada pelanggan. Misi kami adalah memberikan pengalaman makan yang luar
                            biasa dengan menggunakan bahan-bahan segar dan berkualitas, serta memberikan pelayanan yang ramah
                            dan profesional kepada setiap pelanggan yang datang ke restoran kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Konten Restoran -->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Menu Unggulan</h2>
                <p>Restoran kami menawarkan berbagai macam hidangan lezat, mulai dari hidangan tradisional hingga hidangan
                    modern yang inovatif. Dengan menggunakan bahan-bahan segar dan berkualitas, kami selalu berusaha untuk
                    memberikan pengalaman makan yang tak terlupakan kepada setiap pelanggan kami.</p>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Makanan</h3>
                        <img src="{{asset('/img/about/makanan.jpg')}}" alt="makanan.jpg" style="width: 50%; margin-bottom: 10px;">
                        <ul>
                            @foreach ($menu as $m)
                            @if($m->kategori->kategori == "Makanan")
                            <li> {{ $m->nama_menu }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Minuman</h3>
                        <img src="{{asset('/img/about/minuman.jpg')}}" alt="minuman.jpg" style="width: 50%; margin-bottom: 10px;">
                        <ul>
                            @foreach ($menu as $m)
                            @if($m->kategori->kategori == "Minuman")
                            <li> {{ $m->nama_menu }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Camilan</h3>
                        <img src="{{asset('/img/about/camilan.jpg')}}" alt="camilan.jpg" style="width: 50%; margin-bottom: 10px;">
                        <ul>
                            @foreach ($menu as $m)
                            @if($m->kategori->kategori == "Camilan")
                            <li> {{ $m->nama_menu }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Our team-->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3 class="text-black">Web DaharResto</h3>
                <p><b>DaharResto</b> merupakan website Sistem Manajemen Restoran yang dibuat oleh 5 Mahasiswa dari berbagai perguruan tinggi di Indonesia yang tergabung dalam sebuah
                    tim pada program Magang dan Studi Independen Batch 5 dengan mitra PT. Educa Sisfomedia Indonesia (Gamelab.id). </p>
                <h3 class="text-black mb-3">Tim Kami</h3>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('/img/about/donny.jpg')}}" alt="donny" class="rounded-circle" style="width: 50%;">
                        <br>
                        <i class="fa-solid fa-chess-king"></i> Donnny Damara Nanda Putra Arifin <br>
                        <i class="fa-solid fa-building-columns"></i> Universitas Islam Balitar <br>
                        <i class="fa-brands fa-square-instagram"></i> donny_arifin01 <br>
                        <i class="fa-solid fa-envelope-open-text"></i> donnydamara120501@gmail.com
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('/img/about/syifa.jpg')}}" alt="syifa" class="rounded-circle" style="width: 50%;">
                        <br>
                        <i class="fa-solid fa-chess-queen"></i> May Syifa Sandriyani <br>
                        <i class="fa-solid fa-building-columns"></i> Universitas Bandar Lampung <br>
                        <i class="fa-brands fa-square-instagram"></i> syifa_sandriyani <br>
                        <i class="fa-solid fa-envelope-open-text"></i> syifasandriyani@gmail.com
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('/img/about/alfa.jpg')}}" alt="alfa" class="rounded-circle" style="width: 50%;">
                        <br>
                        <i class="fa-solid fa-chess-king"></i> Alfaafa Wafiq Ismail <br>
                        <i class="fa-solid fa-building-columns"></i> Universitas Bina Sarana Informatika <br>
                        <i class="fa-brands fa-square-instagram"></i> alfaafawi <br>
                        <i class="fa-solid fa-envelope-open-text"></i> alfaafawafiq@gmail.com
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-md-4">
                        <img src="{{asset('/img/about/umi.jpg')}}" alt="umi" class="rounded-circle" style="width: 50%;">
                        <br>
                        <i class="fa-solid fa-chess-queen"></i> Umi Ayuni <br>
                        <i class="fa-solid fa-building-columns"></i> Universitas Bina Sarana Informatika <br>
                        <i class="fa-brands fa-square-instagram"></i> y_uni36 <br>
                        <i class="fa-solid fa-envelope-open-text"></i> umiayuni99@gmail.com
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('/img/about/irfan.jpg')}}" alt="irfan" class="rounded-circle" style="width: 50%;">
                        <br>
                        <i class="fa-solid fa-chess-king"></i> Irfan Afandi <br>
                        <i class="fa-solid fa-building-columns"></i> Universitas Islam Sultan Agung <br>
                        <i class="fa-brands fa-square-instagram"></i> i.afandi <br>
                        <i class="fa-solid fa-envelope-open-text"></i> irfanafandi973@gmail.com
                    </div>
                    <div class="col-md-3">
                        <img src="{{asset('/image/logo.jpg')}}" alt="logo" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content -->
@endsection