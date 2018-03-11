@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('sewaRuko.index') }}"><i class="fa text-default fa-chevron-left" style="color: blue;"></i></a> Detail Data Ruko yang Disewa
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Alamat Penyewa</th>
						<th>No Handphone</th>
						<th>Jenis Usaha</th>
						<th>Periode Penyewaan</th>
						<th>No. Ruko yg Disewa</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $sewaruko->nama }}</td>
							<td>{{ $sewaruko->alamat }}</td>
							<td>{{ $sewaruko->no_hp }}</td>
							<td>{{ $sewaruko->jenis_usaha }}</td>
							<td>{{ $sewaruko->periode_penyewaan }}</td>
							<td>{{ $sewaruko->ruko_id }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection