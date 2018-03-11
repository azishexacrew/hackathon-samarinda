@extends('_layouts.default')

@section('tubuh')
  <div class="container-fluid" id="body">
  	<form>
    <div class="row">
      <div class="panel">
        <div class="panel-heading text-center">
          <div class="h2">Cara Pembayaran</div>
        </div>
        <div class="container-fluid">
          <div class="row">
          <div class="h4 col-sm-offset-4">Silahkan melakukan pembayaran pada rekening dibawah</div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama" class="control-label">Nama</label>
                <input class="form-control" name="nama" type="text" value="{{$user->nama}}" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="norek" class="control-label">Nomor Rekening</label>
                <input class="form-control" name="norek" type="text" value="{{$user->event->rekening}}" required="">
           </div>

            <div class="form-group col-sm-offset-5 col-sm-1 text-center">
              <a href="{{route('pembayaran.konfirmasi')}}" class="btn btn-primary btn-md">Konfirmasi Pembayaran</a>
           </div>
         </div>
           </div>

        </div>
      </div>
      </div>
  </form>
  </div>

@endsection
