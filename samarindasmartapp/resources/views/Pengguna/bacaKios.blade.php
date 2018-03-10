@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('pengguna.rukokios') }}"><i class="fa text-default fa-chevron-left" style="color: blue;"></i></a> Detail Data Kio
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nomor Kios</th>
						<th>Blok Kios</th>
						<th>Keterangan</th>
						<th>Harga</th>
						<th>Dokumentasi</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $kios->nomor_kios }}</td>
							<td>{!! $kios->blok_kios !!}</td>
							<td>{!! $kios->keterangan !!}</td>
							<td>{{ $kios->harga_sewa_per_tahun }}</td>
							<td><a href="{{ asset('gambar_kios/' . $kios->image) }}" target="_blank"><img src="{{ asset('gambar_kios/' . $kios->image) }}" class="img-responsive"  height="100" width="200"></a></td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection