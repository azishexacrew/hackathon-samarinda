@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('pengguna.rukokios') }}"><i class="fa text-default fa-chevron-left" style="color: blue;"></i></a> Detail Data Ruko
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nomor Ruko</th>
						<th>Blok Ruko</th>
						<th>Keterangan</th>
						<th>Harga Sewa/Tahun (Rp)</th>
						<th>Dokumentasi</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $ruko->nomor_ruko }}</td>
							<td>{!! $ruko->blok_ruko !!}</td>
							<td>{!! $ruko->keterangan !!}</td>
							<td>{{ $ruko->harga_sewa_per_tahun }}</td>
							<td><a href="{{ asset('gambar_ruko/' . $ruko->image) }}" target="_blank"><img src="{{ asset('gambar_ruko/' . $ruko->image) }}" class="img-responsive"  height="100" width="200"></a></td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection