@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
    @endif
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
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_kategori }}</span>
                            <span class="info-box-text">Kategori</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

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
                            <i class="nav-icon fa fa-cart-plus"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_detail_pesanan }}</span>
                            <span class="info-box-text">Transaksi</span>
                        </div>
                    </div>
                </div>

                <!-- /.col -->
            </div>
        </div>
    </div>

  
        <div class="row">
            <div class="col-md-3">
                <div id="chart2a" style="width:100%; max-width:310px; height:230px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart2a);

                    function drawChart2a() {
                        // Create a data table
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Jenis Pesanan');
                        data.addColumn('number', 'Jumlah');
                        data.addRows(<?php echo json_encode($dataArray); ?>);

                        // Set options
                        var options = {
                            title: 'Tipe Pesanan',
                            is3D: true
                        };

                        // Instantiate and draw the chart
                        var chart = new google.visualization.PieChart(document.getElementById('chart2a'));
                        chart.draw(data, options);
                    }
                </script>
            </div>

            <div class="col-md-2">
                @if (!empty($menuLaris) && !empty($secondMenuLaris))
                    <div id="chartMenuLaris" style="width: 350%; height: 230px;"></div>

                    <!-- Include Google Charts CDN -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Menu', 'Total Pesanan'],
                                ['{{ $menuLaris->nama_menu }}', {{ $menuLaris->total }}],
                                ['{{ $secondMenuLaris->nama_menu }}', {{ $secondMenuLaris->total }}]
                                // Add more rows if needed
                            ]);

                            var options = {
                                title: 'Menu Terlaris',
                                chartArea: {
                                    width: '50%'
                                },
                                hAxis: {
                                    title: 'Total Pesanan',
                                    minValue: 0,
                                    format: 'decimal' // Set the number format to decimal
                                },
                            };

                            var chart = new google.visualization.BarChart(document.getElementById('chartMenuLaris'));
                            chart.draw(data, options);
                        }
                    </script>
                @else
                    <p>Tidak ada data menu laris.</p>
                @endif
            </div>

        </div>
    </div>

    <
        <div class="row">
            <div class="col-md-3">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    // Load library visualisasi dan paket 'corechart'.
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });

                    // Panggil fungsi drawChart saat library sudah dimuat.
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        // Buat data tabel.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Kategori');
                        data.addColumn('number', 'Jumlah');
                        data.addRows([
                            @foreach ($data as $item)
                                ['{{ $item->id_kategori }}', {{ $item->total }}],
                            @endforeach
                        ]);

                        // Set opsi chart.
                        var options = {
                            title: 'Jumlah Menu per Kategori',
                            is3D: true,
                        };

                        // Instansiasi dan menggambar chart, melewatkan beberapa opsi.
                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                </script>
                <body>
                    <!-- Menampilkan diagram lingkaran -->
                    <div id="chart_div" style="width: 310px; height: 270px;"></div>
                </body>
            </div>

            <div class="col-md-2">
                <div id="area_chart_div" style="width: 350%; height: 270px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawAreaChart);

                    function drawAreaChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Week', 'Profit'],
                            ['1', 1000],
                            ['2', 1170],
                            ['3', 660],
                            ['4', 1030],
                        ]);

                        var options = {
                            title: 'Company Performance',
                            hAxis: { title: 'Week', titleTextStyle: { color: '#333' } },
                            vAxis: { minValue: 0 },
                        };

                        var chart = new google.visualization.AreaChart(document.getElementById('area_chart_div'));
                        chart.draw(data, options);
                    }
                </script>
            </div>
        </div>

    </div>


@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@endsection
