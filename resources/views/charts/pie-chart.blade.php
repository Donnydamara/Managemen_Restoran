<!-- File: resources/views/charts/pie-chart.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pie Chart</div>

                    <div class="card-body">
                        {!! $chart->html() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! $chart->script() !!}
@endsection
