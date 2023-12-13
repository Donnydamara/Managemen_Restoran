@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard Manager</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-dark shadow-sm">
                            <i class="bi bi-menu-up"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_menu }}</span>
                            <span class="info-box-text">Menu</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-dark shadow-sm">
                            <i class="bi bi-tags-fill"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_kategori}}</span>
                            <span class="info-box-text">Kategori</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-dark shadow-sm">
                            <i class="nav-icon fa fa-line-chart"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Profit</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-dark shadow-sm">
                            <!-- Use fas instead of fa for Font Awesome 5 and later -->
                            <i class="nav-icon fa fa-line-chart"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <script src="https://www.gstatic.com/charts/loader.js"></script>
        </head>

        <body>

            <div class="container-fluid mt-5">
                <div class="row">
                    <!-- Chart2a -->
                    <div class="col-md-3">
                        <div id="chart2a" style="width:100%; max-width:300px; height:230px;"></div>
                        <script>
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart2a);

                            function drawChart2a() {
                                // Set Data
                                const data = google.visualization.arrayToDataTable([
                                    ['Country', 'Mhl'],
                                    ['Makanan', 54.8],
                                    ['Minuman', 48.6],
                                    ['Cemilan', 44.4],
                                ]);

                                // Set Options
                                const options = {
                                    title: 'Menu Terlaris',
                                    is3D: true
                                };

                                // Draw
                                const chart = new google.visualization.PieChart(document.getElementById('chart2a'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>

                    <!-- Chart2b -->
                    <div class="col-md-3">
                        <div class="col-md-3">
                            <canvas id="badCanvas1" width="400" height="300"></canvas>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Mengambil data dari server menggunakan AJAX
                                    fetch('/chart-data')
                                        .then(response => response.json())
                                        .then(data => {
                                            // Set Data
                                            const labels = data.map(row => row[0]);
                                            const values = data.map(row => row[1]);
                        
                                            // Set Options
                                            const options = {
                                                title: {
                                                    display: true,
                                                    text: 'Tipe Pesanan'
                                                }
                                                // Tambahkan opsi lain sesuai kebutuhan
                                            };
                        
                                            // Draw
                                            const ctx = document.getElementById('badCanvas1').getContext('2d');
                                            const chart = new Chart(ctx, {
                                                type: 'pie',
                                                data: {
                                                    labels: labels,
                                                    datasets: [{
                                                        data: values,
                                                        backgroundColor: ['green', 'brown']
                                                        // Tambahkan opsi dataset lain sesuai kebutuhan
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Tipe Pesanan'
                                                    },
                                                    responsive: true, // Izinkan responsifitas
                                                    maintainAspectRatio: false, // Tidak perlu mempertahankan rasio aspek
                                                }
                                            });
                                        })
                                        .catch(error => {
                                            console.error('Error fetching data:', error);
                                        });
                                });
                            </script>
                        </div>
                        
                    </div>

                    <!-- Chart1 -->
                    <div class="col-md-6">
                        <canvas id="chart1" style="width:100%;max-width:800px"></canvas>
                        <script>
                            // Use month names instead of numbers
                            const monthNames = [
                                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                "Jul", "Aug", "Sept", "Okt", "Nov", "Des"
                            ];

                            new Chart("chart1", {
                                type: "line",
                                data: {
                                    labels: monthNames,
                                    datasets: [{
                                        data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                                        borderColor: "red",
                                        fill: false
                                    }, {
                                        data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                                        borderColor: "orange",
                                        fill: false
                                    }, {
                                        data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                                        borderColor: "blue",
                                        fill: false
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </div>
    <!-- Add the necessary CSS and JavaScript files -->
@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add any additional CSS or JavaScript files here -->
@endsection
@endsection
