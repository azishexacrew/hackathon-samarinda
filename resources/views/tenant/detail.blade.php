@extends('_layouts.default')

@section('tubuh')
<div class="container text-center h3">Informasi Tenant</div>
<div class="container-fluid" id="body">
	<div class="row">
		<form action="{{route('tenant.store')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="col-sm-offset-1 col-sm-3">
			<div class="form-group">
				<div class="panel panel-default text-right">
			  		<div class="panel-heading text-left">Gambar Tenant</div>
			  		<img id="image-holder" src="{{asset('image/'.$tenant->gambar)}}" alt="" height="100%" width="100%">
			</div>
			</div>
		</div>

		<div class="col-sm-4">
	 <div class="form-group">
    	<label for="nama_event">Nama Tenant</label>
    	<input type="text" class="form-control" name="nama" id="nama_event" value="{{$tenant->nama}}">
  	</div>
   	<div class="form-group">
	    <label for="deskripsi_event">Deskripsi Tenant</label>
	    <textarea type="text" class="form-control" name="penjelasan" id="deskripsi_event">{{$tenant->penjelasan}}</textarea>
  	</div>
		<div class="form-group">
			<label for="kecamatan">Pilih Kecamatan</label>
			<select class="form-control" name="kecamatan" id="kecamatan">
				@for ($i=0; $i < count($kec); $i++)
					<option value="{{$kec[$i]['id']}}" {{$tenant->kecamatan == $kec[$i]['id']?'selected':''}}>{{$kec[$i]['name']}}</option>
				@endfor
			</select>
		</div>
		<div class="form-group">
	    <label for="deskripsi_event">Kontak</label>
	    <input type="text" class="form-control" name="kontak" id="nama_event" value="{{$tenant->kontak}}">
  	</div>
  	<div class="form-group">
	    <label for="alamat_event">Alamat Tenant</label>
	 	<textarea type="text" class="form-control" name="alamat" id="alamat_event">{{$tenant->alamat}}</textarea>
  	</div>

		</div>
		</form>
	</div>
</div>
@endsection
