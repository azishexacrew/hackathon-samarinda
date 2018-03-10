@extends('layoutsAdmin.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong>Semua Ruko</strong> <a href="{{route('ruko.create')}}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus"></i> Tambah Ruko Baru</a>
					<div class="clearfix"></div>
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nomor Ruko</th>
						<th>Blok Ruko</th>
						<th>Harga Sewa/Tahun (Rp)</th>
						<th>Aksi</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						@foreach ($rukos as $data)
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $data->nomor_ruko }}</td>
							<td>{{ $data->blok_ruko }}</td>
							<td>{{ $data->harga_sewa_per_tahun }}</td>
							<td><a href="{{ route('ruko.show', $data->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a> <a href="{{ route('ruko.edit', $data->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="card-footer clearfix">
						<div class="text-center">
							{!! $rukos->links(); !!}
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection