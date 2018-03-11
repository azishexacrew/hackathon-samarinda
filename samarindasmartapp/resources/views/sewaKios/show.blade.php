@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('sewaKios.index') }}"><i class="fa text-default fa-chevron-left" style="color: blue;"></i></a> Detail Data Kios yang Disewa
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Alamat Penyewa</th>
						<th>No Handphone</th>
						<th>Jenis Usaha</th>
						<th>Periode Penyewaan</th>
						<th>No. Kios yg Disewa</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $sewakios->nama }}</td>
							<td>{{ $sewakios->alamat }}</td>
							<td>{{ $sewakios->no_hp }}</td>
							<td>{{ $sewakios->jenis_usaha }}</td>
							<td>{{ $sewakios->periode_penyewaan }}</td>
							<td>{{ $sewakios->kios_id }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection