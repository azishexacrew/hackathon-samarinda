@extends('_layouts.default')

@section('tubuh')
  <div class="container-fluid">
    <div class="row">
      {{-- <div class="col-xs-12"> --}}
        <div class="h3 text-center kotak-konfirmasi">
          Selamat tenant Anda Berhasil Buat
        </div>
      {{-- </div> --}}
    </div>
    <br>
    <div class="row">
      <div class="text-center">
        <a href="#" class="btn btn-success btn-lg" >Lihat Informasi Tenant</a>
      </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="form-group text-center">
          <h4>Berikan Kritik dan Saran Anda Kepada Kami</h4>
          <div class="container">
            <div class="col-md-6 col-md-offset-3">
              <textarea name="kritik" class="form-control" ></textarea>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="text-center">
        <a href="#" class="btn btn-success btn-md">Kirim</a>
      </div>
    </div>
  </div>
@endsection
