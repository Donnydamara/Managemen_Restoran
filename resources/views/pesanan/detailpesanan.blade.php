@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Detail Pesanan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Detail Pesanan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

		{{-- main content here --}}

		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto d-flex justify-content-center">
					<div class="card mb-3">
						<div id="printableArea">
							<div class="card-header">
								<h3>Pesanan {{ $no_pesanan }}</h3>
							</div>
							<div class="card-body">
								<p class="m-0"><strong>Tipe :</strong></p>
								<p>{{ $jenis_pesanan }} | {{ $jenis_pembayaran }}</p>
								<table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="data-table">
									<thead>
										<tr style="background-color: #2c3e50; color: white;">
											<th>No.</th>
											<th>Menu</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($detail_pesanan as $detail_pesanans)
										<tr>
											<td> {{ $loop->index + 1 }} </td>
											<td> {{ $detail_pesanans->nama_menu }} </td>
											<td> {{ $detail_pesanans->harga }} </td>
											<td> {{ $detail_pesanans->jumlah }} </td>
											<td> {{ $detail_pesanans->subtotal }} </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12 text-center mt-3">
							<button onclick="cetak('printableArea')" class="btn btn-primary mr-3 mb-3"><i class="fa fa-print"> </i> Cetak Struk</button>
							<a class="btn btn-danger mb-3" href=" {{ route('pesanan') }} "><i class="fa fa-plus"> </i> Order Baru</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
<script>
	function cetak(divId) {
		var printContents = document.getElementById(divId).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>