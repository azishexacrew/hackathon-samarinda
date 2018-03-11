@extends('_layouts.default')

@section('tubuh')
<div class="container text-center h3">Info Event</div>
<div class="container-fluid" id="body">
	<div class="row">
		<form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="col-sm-offset-1 col-sm-3">
			<div class="form-group">
				<div class="panel panel-default text-right">
			  		<div class="panel-heading text-left">Gambar Event</div>
			  		<img id="image-holder" src="{{asset('image/'.$event->gambar)}}" id="image" alt="image" height="100%" width="100%"></img>
			</div>
			</div>
		</div>

		<div class="col-sm-4">
      <div class="form-group">
       	<label for="nama_owner">Nama Owner</label>
       	<input type="text" name="nama_owner" class="form-control" value="{{\Auth::user()->where('id',$event->user_id)->value('nama')}}" readonly="">
     	</div>
	 <div class="form-group">
    	<label for="nama_event">Nama Event</label>
    	<input type="text" name="nama_event" class="form-control" value="{{$event->nama}}" readonly="">

  	</div>
    <div class="form-group">
     	<label for="kode_unik">kode unik Event</label>
     	<input type="text" name="kode_unik" class="form-control" value="{{$event->kunci}}" readonly="">
   	</div>
   	<div class="form-group">
	    <label for="deskripsi_event">Deskripsi Event</label>
     	<input type="text" name="deskripsi_event" class="form-control" value="{{$event->penjelasan}}" readonly="">
  	</div>
	<div class="form-group">
		<label for="kecamatan">Pilih Kecamatan</label>
     	<input type="text" name="deskripsi_event" class="form-control" value="{{$event->kecamatan}}" readonly="">
	</div>
  	<div class="form-group">
	    <label for="alamat_event">Alamat Event</label>
     	<input type="text" name="alamat_event" class="form-control" value="{{$event->alamat}}" readonly="">
  	</div>
  	<div class="row">
	  		<div class="form-group col-sm-6">
			<label for="bentuk_tenant">Bentuk Tenant</label>
	     	<input type="text" name="bentuk_tenant" class="form-control" value="{{$event->bentuk_tenant}}" readonly="">
	  	</div>
			<div class="form-group col-sm-6">
				<label for="">Kategori</label>
		     	<input type="text" name="kategori" class="form-control" value="{{$event->kategori}}" readonly="">
				<label for="">Harga</label>
				<input type="text" name="harga" class="form-control" value="{{$event->harga}}" readonly="">
			</div>
  	</div>
 	<div class="form-group">
    	<label for="rekening">Nomor Rekening</label>
		<input type="text" name="rekening" class="form-control" value="{{$event->rekening}}" readonly="">
  	</div>
 	<div class="form-group">
    	<label for="nama_rek">Nama Pemilik Rekening</label>
		<input type="text" name="rekening" class="form-control" value="{{$event->nama_rekening}}" readonly="">
  </div>
    @if (\Auth::user()->event && \Auth::user()->event->id != $event->id || !\Auth::user()->event)
      <div class="form-group">
        <a href="{{route('pembayaran.create',['user_id' => $event->user_id])}}" class="btn btn-md btn-success">Pesan Tenant</a>
      </div>
    @endif
		</div>
		</form>
	</div>
</div>
@endsection
