@extends('layoutsAdmin.app')

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
				<div class="card-header">
					<strong><a href="{{ route('kios.index') }}"><i class="fa fa-chevron-left" style="color: blue;"></i></a> Tambah Kios Baru</strong>
				</div>
				<div style="margin-left: 10px;margin-right: 10px; ">
					{!! Form::open(array('route' => 'kios.store', 'files' => true)) !!}
						{{ Form::label('nomor_kios', 'Nomor Kios:') }}
						{{ Form::text('nomor_kios', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Nomor Kios')) }}
						<br>
						{{ Form::label('blok_kios', 'Blok Kios:') }}
						{{ Form::text('blok_kios', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Blok Kios')) }}
						<br>
						{{ Form::label('slug', 'URL:') }}
						{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'placeholder' => 'Isi URL')) }}
						<br>
						{{ Form::label('featured_image', 'Upload Gambar:') }}
						{{ Form::file('featured_image') }}
						<br>
						<br>
						{{ Form::label('keterangan', 'Keterangan:') }}
						{{ Form::textarea('keterangan', null, array('class' => 'form-control')) }}
						<br>
						{{ Form::label('harga_sewa_per_tahun', 'Harga Sewa/Tahun:') }}
						{{ Form::text('harga_sewa_per_tahun', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Harga Sewa/Tahun')) }}

						{{ Form::submit('Tambah Kios', array('class' => 'btn btn-outline-success btn-lg btn-block', 'style' => 'margin-top:20px;margin-bottom:20px;')) }}
						{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
