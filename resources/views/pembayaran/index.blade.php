@extends('_layouts.default')

@section('tubuh')
  <div class="container-fluid" id="body">
    <div class="row">
      <div class="panel">
        <div class="panel-heading text-center">
          <div class="h2">Info dan Pembayaran tenant</div>
        </div>
        <div class="container-fluid">
          <div class="row">        
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="kode_unik" class="control-label">Kode unik tenant pendaftar</label>
                <input class="form-control" id="kode_unik" type="text" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">Nama tenant pendaftar</label>
                <input class="form-control" id="nama_tenant" type="text" required="">
           </div>
            <div class="form-group col-sm-offset-6 col-sm-1">
              <button class="btn btn-primary">Cek informasi tenant</button>
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">Nama Pembayar</label>
                <input class="form-control" id="nama_pembayar" type="text" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">No REK</label>
                <input class="form-control" id="nama_tenant" type="text" required="">
           </div>
            <div class="form-group col-sm-4 col-sm-offset-4">
              <div class="panel panel-default text-right">
                  <div class="panel-heading text-left">Upload gambar bukti pembayaran</div>
                  <img id="image-holder" alt="" height="100%" width="100%" alt="img">
            </div>
            </div>
            <div class="form-group col-sm-offset-5 col-sm-1 text-center">
              <input class="btn btn-primary" value="Konfirmasi">
           </div>
         </div>
           </div>
          
        </div>
      </div>
      </div>
  </div>
@endsection
