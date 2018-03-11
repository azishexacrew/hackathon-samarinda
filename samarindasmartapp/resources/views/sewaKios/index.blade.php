@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Data Kios yang Disewa
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Jenis Usaha</th>
						<th>Periode Penyewaan</th>
						<th>No. Kios yg Disewa</th>
						<th>Aksi</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						@foreach ($sewakios as $data)
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $data->nama }}</td>
							<td>{{ $data->jenis_usaha }}</td>
							<td>{{ $data->periode_penyewaan }}</td>
							{{-- <td>{{ $data->noruko->nomor_ruko }}</td> --}}
							<td>{{ $data->kios_id }}</td>
							<td><a href="{{ route('sewaKios.show', $data->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection