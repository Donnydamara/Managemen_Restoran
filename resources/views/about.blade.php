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
            <div class="row">
                <div class="col-md-6">
                    <h3>Sejarah</h3>
                    <p>Restoran kami didirikan pada tahun 1990 oleh John Doe. Sejak itu, kami telah berkomitmen untuk
                        menyajikan makanan berkualitas tinggi dan layanan terbaik kepada pelanggan kami. Dengan berbagai
                        macam hidangan lezat, restoran kami telah menjadi tempat favorit bagi banyak orang untuk menikmati
                        hidangan berkualitas tinggi dalam lingkungan yang nyaman dan ramah.</p>
                </div>
                <div class="col-md-6">
                    <h3>Visi dan Misi</h3>
                    <p>Visi kami adalah untuk menjadi restoran terdepan dalam menyajikan masakan berkualitas tinggi dengan
                        pelayanan yang luar biasa kepada pelanggan. Misi kami adalah memberikan pengalaman makan yang luar
                        biasa dengan menggunakan bahan-bahan segar dan berkualitas, serta memberikan pelayanan yang ramah
                        dan profesional kepada setiap pelanggan yang datang ke restoran kami.</p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Konten Restoran -->
    <div class="content">
        <div class="container-fluid">
            <h2>Menu Unggulan</h2>
            <p>Restoran kami menawarkan berbagai macam hidangan lezat, mulai dari hidangan tradisional hingga hidangan
                modern yang inovatif. Dengan menggunakan bahan-bahan segar dan berkualitas, kami selalu berusaha untuk
                memberikan pengalaman makan yang tak terlupakan kepada setiap pelanggan kami.</p>
            <h3>Makanan</h3>
            <ul>
                <li>Nasi Goreng</li>
                <li>Mie Goreng</li>
                <li>Burger</li>
                <li>Steak</li>
            </ul>
            <h3>Minuman</h3>
            <ul>
                <li>Jus Segar</li>
                <li>Kopi Spesial</li>
                <li>Minuman Soda</li>
                <li>Mocktail</li>
            </ul>
        </div>
    </div>
    <!-- /.content -->
@endsection
