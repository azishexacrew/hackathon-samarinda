@extends('_layouts.default')

@section('tubuh')
<div class="container text-center h3">Info event</div>
<div class="container-fluid" id="body">
	<div class="row">
		<form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="col-sm-offset-1 col-sm-3">
			<div class="form-group">
				<div class="panel panel-default text-right">
			  		<div class="panel-heading text-left">Gambar Event</div>
			  		<img id="image-holder" src="{{asset('image/'.$event->gambar)}}" alt="" height="100%" width="100%">
			</div>
			</div>
		</div>

		<div class="col-sm-4">
      <div class="form-group">
       	<label for="nama_event">Nama Owner</label>
       	{{\Auth::user()->where('id',$event->user_id)->value('nama')}}
     	</div>
	 <div class="form-group">
    	<label for="nama_event">Nama Event</label>
    	{{$event->nama}}
  	</div>
    <div class="form-group">
     	<label for="nama_event">kode unik Event</label>
     	{{$event->kunci}}
   	</div>
   	<div class="form-group">
	    <label for="deskripsi_event">Deskripsi Event</label>
	    {{$event->penjelasan}}
  	</div>
		<div class="form-group">
			<label for="kecamatan">Pilih Kecamatan</label>
			{{$event->kecamatan}}
		</div>
  	<div class="form-group">
	    <label for="alamat_event">Alamat Event</label>
	 	   {{$event->alamat}}
  	</div>
  	<div class="row">
	  		<div class="form-group col-sm-6">
			<label for="bentuk_tenant">Bentuk Tenant</label>
		 	{{$event->bentuk_tenant}}
	  	</div>
			<div class="form-group col-sm-6">
				<label for="">kategori</label>
        {{$event->kategori}}
				<label for="">harga</label>
				{{$event->harga}}
			</div>
  	</div>
 	<div class="form-group">
    	<label for="no_rek">Nomor Rekening</label>
    	{{$event->rekening}}
  	</div>
 	<div class="form-group">
    	<label for="nama_rek">Nama Pemilik Rekening</label>
    	{{$event->nama_rekening}}
  	</div>
    @if (\Auth::user()->event->kunci != $event->kunci)
      <div class="form-group">
        <a href="#" class="btn btn-lg btn-success">Pesan Tenant</a>
      </div>
    @endif
		</div>
		</form>
	</div>
</div>
@endsection
