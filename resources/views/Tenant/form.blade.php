@extends('_layouts.default')

@section('tubuh')
<div class="container text-center h3">Buat Tenant</div>
<div class="container-fluid" id="body">
	<div class="row">
		<form action="{{route('tenant.store')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="col-sm-offset-1 col-sm-3">
			<div class="form-group">
				<div class="panel panel-default text-right">
			  		<div class="panel-heading text-left">Upload Gambar Tenant</div>
			  		<img id="image-holder" alt="" height="100%" width="100%">
				<input type="file" name="gambar" id="profileimg">
				<label for="profileimg" class="btn btn-success btn-sm" style="margin: 5px 5px 5px 5px">Input file</label>
			</div>
			</div>
		</div>

		<div class="col-sm-4">
	 <div class="form-group">
    	<label for="nama_event">Nama Tenant</label>
    	<input type="text" class="form-control" name="nama" id="nama_event" >
  	</div>
   	<div class="form-group">
	    <label for="deskripsi_event">Deskripsi Tenant</label>
	    <textarea type="text" class="form-control" name="penjelasan" id="deskripsi_event"></textarea>
  	</div>
		<div class="form-group">
			<label for="kecamatan">Pilih Kecamatan</label>
			<select class="form-control" name="kecamatan" id="kecamatan">
				@for ($i=0; $i < count($kec); $i++)
					<option value="{{$kec[$i]['id']}}">{{$kec[$i]['name']}}</option>
				@endfor
			</select>
		</div>
		<div class="form-group">
	    <label for="deskripsi_event">Kontak</label>
	    <textarea type="text" class="form-control" name="kontak" id="deskripsi_event"></textarea>
  	</div>
  	<div class="form-group">
	    <label for="alamat_event">Alamat Tenant</label>
	 	<textarea type="text" class="form-control" name="alamat" id="alamat_event"></textarea>
  	</div>
  	<div class="form-group">
  		<button type="submit" class="btn btn-success">Buat Tenant</button>
  	</div>
		</div>
		</form>
	</div>
</div>
@endsection
