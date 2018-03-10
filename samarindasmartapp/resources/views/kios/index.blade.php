@extends('layoutsAdmin.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong>Semua Kios</strong> <a href="{{route('kios.create')}}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus"></i> Tambah Kios Baru</a>
					<div class="clearfix"></div>
				</div>
				<table class="table">
					<thead>
						<th>No</th>
						<th>Nomor Kios</th>
						<th>Blok Kios</th>
						<th>Harga Sewa/Tahun (Rp)</th>
						<th>Aksi</th>
					</thead>

					<tbody>
						<?php $x=1;?>
						@foreach ($kioss as $data)
						<tr>
							<th>{{ $x++ }}</th>
							<td>{{ $data->nomor_kios }}</td>
							<td>{!! $data->blok_kios !!}</td>
							<td>{{ $data->harga_sewa_per_tahun }}</td>
							<td><a href="{{ route('kios.show', $data->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a> <a href="{{ route('kios.edit', $data->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="card-footer clearfix">
						<div class="text-center">
							{!! $kioss->links(); !!}
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection