@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<a href="{{ route('kios.index') }}"><i class="fa text-default fa-chevron-left" style="color: white;"></i></a> {{ $kios->nomor_kios }}
				</div>
				<div style="margin-left: 10px;margin-right: 10px; ">
					<a href="{{ asset('gambar_kios/' . $kios->image) }}"><img src="{{ asset('gambar_kios/' . $kios->image) }}" height="400" width="700"></a>
					<br>
					<br>
					<p>Nomor Blok : <strong>{!! $kios->blok_kios !!}</strong></p>
					<p>Keterangan : <strong>{!! $kios->keterangan !!}</strong></p>
				</div>
			</div>
		</div>
		<div class="col-md-4 ">
				<div class="well">
					<dl class="dl-horizontal">
						<label>URl: </label>
						<p><a href="{{ url('pengguna/'.$kios->slug) }}" target="_blank">{{ url('pengguna/'.$kios->slug) }}</a></p>
					</dl>
					<dl class="dl-horizontal">
						<label>Harga Sewa/Tahun (Rp): </label>
						<p>{{ $kios->harga_sewa_per_tahun }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Dibuat Tanggal: </label>
						<p>{{ date('M j, Y h:ia', strtotime($kios->created_at)) }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Di Perbaharui Tanggal: </label>
						<p>{{ date('M j, Yh:ia', strtotime($kios->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('kios.edit', 'Edit', array($kios->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['kios.destroy', $kios->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<br>
							{{ Html::linkRoute('kios.index', '<< Kembali', [], ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@endsection