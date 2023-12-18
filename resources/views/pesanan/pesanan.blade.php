<!-- by syifa -->
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pesanan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Pesanan</li>
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

		<div class="row">
			<div class="col-12 col-sm-6 col-md-6">
				<form action="{{ route('pesanan.carisubmit') }}" method="POST">
					@csrf
					<input type="text" id="cari" name="cari" placeholder="cari">
					<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
						Cari Menu
					</button>
					<a href="{{ route('pesanan') }}" class="btn btn-primary"><i class="fa fa-refresh"></i>
						Reset Pencarian
					</a>
				</form>
				<div style="max-height: 500px; overflow-y: scroll;">
					@foreach ($menu as $m)
					<div class="card mb-3 mt-3">
						<div class="row g-0">
							<div class="col-md-5 m-3">
								<img src="{{ asset('/img/menu/' . $m->image) }}" class="img-fluid rounded-start" alt="Menu Photo" style="max-width: 200px;">
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<form action="{{ route('pesanan.add') }}" method="POST">
										@csrf
										<h5 class="card-title"><b>{{ $m->nama_menu }}</b></h5>
										<p class="card-text">Kategori : <span>{{ $m->kategori->kategori }}</span></p>
										<p class="card-text">Deskripsi : <span style="text-align: justify;">{{ $m->deskripsi }}</span></p>
										<p class="card-text">Harga : Rp. <span>{{ number_format ($m->harga) }}</span></p>
										<label for="qty">Qty</label>
										<input type="number" min="1" id="qty" name="qty" style="width:40px;" value="1" required>
										<input type="hidden" id="id_menu" name="id_menu" value="{{ $m->id }}">
										<input type="hidden" id="nama_menu" name="nama_menu" value="{{ $m->nama_menu }}">
										<input type="hidden" id="harga" name="harga" value="{{ $m->harga }}">
										<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i>
											Tambah Menu
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6">
				<div class="card-header">
					<div class="card mb-3">
						<div class="row g-0">
							<div class="col-md-12">
								<div class="card-body">
									<h3>Pesanan {{ $no_pesanan }}</h3>
									<div class="table-responsive">
										<table class="table table-hover table-bordered text-center" style="border: 1px solid #ccc;" id="data-table">
											<thead>
												<tr style="background-color: #2c3e50; color: white;">
													<th>No.</th>
													<th>Menu</th>
													<th>Harga</th>
													<th>Jumlah</th>
													<th>Subtotal</th>
													<th>Aksi</th>
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
													<td>
														<a href="{{ route('pesanan.destroy', ['id' => $detail_pesanans->id_detail_pesanan]) }}" class="btn btn-danger btn-md text-white" role="button"><i class="fas fa-trash-can"></i> Hapus</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
									@if ($no_pesanan)
									<form action="{{ route('detailpesanan.proses') }}" method="POST">
										@csrf
										<input type="hidden" name="id_pesanan" value="{{ $id_pesanan }}"></br>
										<label for="jenis_pesanan">Jenis Pesanan</label></br>
										<select name="jenis_pesanan" required>
											<option value="" selected>-Pilih-</option>
											<option value="Bawa Pulang">Bawa Pulang</option>
											<option value="Makan di Tempat">Makan di Tempat</option>
										</select></br></br>
										<label for="jenis_pembayaran">Jenis Pembayaran</label></br>
										<select name="jenis_pembayaran" required>
											<option value="" selected>-Pilih-</option>
											<option value="Tunai">Tunai</option>
											<option value="Edc">Edc</option>
											<option value="Qris">Qris</option>
										</select></br></br>
										<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Proses Pesanan</button>
									</form>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection