@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<strong><a href="{{ route('pengguna.rukokios') }}"><i class="fa fa-chevron-left" style="color: blue;"></i></a> Sewa Ruko Baru</strong>
				</div>
				<div style="margin-left: 10px;margin-right: 10px; ">
					{!! Form::open(array('route' => 'sewaRuko.store', 'files' => true)) !!}
						{{ Form::label('nama', 'Nama Lengkap:') }}
						{{ Form::text('nama', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Nama Lengkap')) }}
						<br>
						{{ Form::label('alamat', 'Alamat Penyewa:') }}
						{{ Form::text('alamat', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Alamat Penyewa')) }}
						<br>
						{{ Form::label('no_hp', 'No. Handphone:') }}
						{{ Form::text('no_hp', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'No. Handphone')) }}
						<br>
						{{ Form::label('jenis_usaha', 'Jenis Usaha:') }}
						{{ Form::text('jenis_usaha', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Jenis Usaha')) }}
						<br>
						{{ Form::label('periode_penyewaan', 'Periode Penyewaan:') }}
						{{ Form::text('periode_penyewaan', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'placeholder' => 'Periode Penyewaan')) }}
						<br>
						{{ Form::label('ruko_id', 'No. Ruko Yg Ingin Disewa:') }}
							<select name="ruko_id" class="form-control">
								@foreach($sewaRuko as $data)
								<option value='{{ $data->id }}'>{{ $data->nomor_ruko }}</option>
								@endforeach
							</select>
							<br>

						{{ Form::submit('Kirim', array('class' => 'btn btn-outline-success btn-lg btn-block', 'style' => 'margin-top:20px;margin-bottom:20px;')) }}
						{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection