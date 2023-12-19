@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
        {{-- Add your success message handling code here --}}
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
                    <div class="info-box bg-primary">
                        <span class="info-box-icon text-white">
                            <img src="{{ asset('img/fast-food.png') }}" alt="Logo">
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_menu }}</span>
                            <span class="info-box-text">Menu</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-success">
                        <span class="info-box-icon text-white">
                            <img src="{{ asset('img/menu.png') }}" alt="Logo">
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_kategori }}</span>
                            <span class="info-box-text">Kategori</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon text-white">
                            <img src="{{ asset('img/profits.png') }}" alt="Logo">
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Profit</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon text-white">
                            <img src="{{ asset('img/money-transfer.png') }}" alt="Logo">
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size: 25px;">{{ $tbl_detail_pesanan }}</span>
                            <span class="info-box-text">Transaksi</span>
                        </div>
                    </div>
                </div>
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
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Jenis Pesanan');
                    data.addColumn('number', 'Jumlah');
                    data.addRows(<?php echo json_encode($dataArray); ?>);

                    var options = {
                        title: 'Tipe Pesanan',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('chart2a'));
                    chart.draw(data, options);
                }
            </script>
        </div>

        <div class="col-md-2">
            @if (!empty($menuLaris) && !empty($secondMenuLaris))
                <div id="chartMenuLaris" style="width: 350%; height: 230px;"></div>

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
                        ]);

                        var options = {
                            title: 'Menu Terlaris',
                            chartArea: {
                                width: '50%'
                            },
                            hAxis: {
                                title: 'Total Pesanan',
                                minValue: 0,
                                format: 'decimal'
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

    <div class="row">
        <div class="col-md-3">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Kategori');
                    data.addColumn('number', 'Jumlah');
                    data.addRows([
                        @foreach ($data as $item)
                            ['{{ $item->id_kategori }}', {{ $item->total }}],
                        @endforeach
                    ]);

                    var options = {
                        title: 'Jumlah Menu per Kategori',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>

            <body>
                <div id="chart_div" style="width: 310px; height: 270px;"></div>
            </body>
        </div>

        <div class="col-md-2">
            <div id="area_chart_div" style="width: 350%; height: 270px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawAreaChart);

                function drawAreaChart() {
                    var profitsByDate = @json($profitsByDate);

                    var data = [
                        ['Date', 'Profit']
                    ];
                    Object.keys(profitsByDate).forEach(function(date) {
                        data.push([date, profitsByDate[date]]);
                    });

                    var dataTable = google.visualization.arrayToDataTable(data);

                    var options = {
                        title: 'Profit by Date',
                        hAxis: {
                            title: 'Date',
                            titleTextStyle: {
                                color: '#333'
                            }
                        },
                        vAxis: {
                            minValue: 0
                        },
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('area_chart_div'));
                    chart.draw(dataTable, options);
                }
            </script>
        </div>
    </div>

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Add your custom styles here */
        .info-box {
            cursor: pointer;
        }

        .info-box:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .info-box .info-box-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-box .info-box-content {
            text-align: center;
        }

        #chart2a,
        #chartMenuLaris,
        #chart_div,
        #area_chart_div {
            margin-top: 20px;
        }
    </style>
@endsection
@endsection
