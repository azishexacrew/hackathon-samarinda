@extends('_layouts.default')

@section('tubuh')
  <div class="container-fluid" id="body">
    <div class="row">
      <div class="panel">
        <div class="panel-heading text-center">
          <div class="h2">Konfirmasi Pembayaran</div>
        </div>
        <div class="container-fluid">
          <div class="row">        
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="kode_unik" class="control-label">Kode unik tenant anda</label>
                <input class="form-control" id="kode_unik" type="text" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">Kode unik tempat tenant</label>
                <input class="form-control" id="nama_tenant" type="text" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">Nama</label>
                <input class="form-control" id="nama_pembayar" type="text" required="">
           </div>
           <div class="form-group col-sm-offset-4 col-sm-4">
              <label for="nama_tenant" class="control-label">No REK</label>
                <input class="form-control" id="nama_tenant" type="text" required="">
           </div>
            <div class="form-group col-sm-4 col-sm-offset-4">
              <div class="panel panel-default text-right">
                  <div class="panel-heading text-left">Upload gambar bukti pembayaran</div>
                  <img id="image-holder" alt="" height="100%" width="100%">
              <input type="file" name="gambar" id="profileimg">
              <label for="profileimg" class="btn btn-success btn-sm" style="margin: 5px 5px 5px 5px">Input file</label>
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
