@extends('layouts.app')

@section('css')
<script type="text/javascript" src="{{ asset('mysetting/tinymce/tinymce.min.js') }}"></script>
<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'link code table'
	});
</script>
@endsection

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div style="margin-left: 10px;margin-right: 10px; ">

					{!! Form::model($kios, ['route' => ['kios.update', $kios->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
			
				{{ Form::label('nomor_kios', 'Nomor Kios:') }}
				{{ Form::text('nomor_kios', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
				{{ Form::label('blok_kios', 'Blok Kios:') }}
				{{ Form::text('blok_kios', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					<br>
					{{ Form::label('slug', 'URL:') }}
					{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
					<br>
					<br>
					{{ Form::label('featured_image', 'Upload Gambar:') }}
					{{ Form::file('featured_image') }}
					<br>
					{{ Form::label('keterangan', "Keterangan:") }}
					{{ Form::textarea('keterangan', null, ['class' => 'form-control']) }}
					<br>
				{{ Form::label('harga_sewa_per_tahun', 'Harga Sewa/Tahun:') }}
				{{ Form::text('harga_sewa_per_tahun', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Dibuat Tanggal: </dt>
							<dd>{{ date('M j, Y h:ia', strtotime($kios->created_at)) }}</dd>
						</dl>
						<dl class="dl-horizontal">
						<dt>Diperbaharui Tanggal: </dt>
							<dd>{{ date('M j, Y h:ia', strtotime($kios->updated_at)) }}</dd>
						</dl>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								{!! Html::linkRoute('kios.show', 'Batal', array($kios->id), array('class' => 'btn btn-danger btn-block')) !!}
							</div>
							<div class="col-sm-6">
								{{ Form::submit('Simpan', ['class' => 'btn btn-success btn-block']) }}
							</div>
						</div>
				</div>
			</div>			
			{!! Form::close() !!}
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript">
	$('.select2-multi').select2();
</script>
@endsection