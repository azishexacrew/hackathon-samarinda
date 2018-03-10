@extends('_layouts.basic')

@section('script-top')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script-bottom')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2({
        placeholder: "Pilih Area",
        allowClear: true
      });
    });
  </script>
@endsection

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
  <div class="row">
      <div class="col-md-6 offset-md-3">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Tambah Data Tenant</h3>
              </div>
              <hr>
              <div class="panel-body">
                  @include('_layouts.error')
                  <form action="{{ $action }}" method="POST" class="form-vertical" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="{{ $method }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label class="control-label" for="area">Area</label>
                          <div class="controls">
                            <select class="js-example-basic-single form-control" name="area" id="area">
                              <option value="{{ old('area') }}">{{ old('area') }}</option>
                                @foreach($apiArea as $item)
                                  <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                               @endforeach
                               @foreach($apiArea2 as $item)
                                 <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="blok">Blok</label>
                          <div class="controls">
                              <input type="text" name="blok" placeholder="Blok" class="form-control" id="blok" value="{{ old('blok') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="nomor">Nomor</label>
                          <div class="controls">
                            <input type="text" name="nomor" placeholder="Nomor" class="form-control" id="nomor" value="{{ old('nomor') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="luas">Luas</label>
                          <div class="controls">
                            <input type="text" name="luas" placeholder="Luas" class="form-control" id="luas" value="{{ old('luas') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="harga">Harga</label>
                          <div class="controls">
                            <input type="text" name="harga" placeholder="Harga" class="form-control" id="harga" value="{{ old('harga') }}">
                          </div>
                      </div>

                      </div>

                      <div class="pull-right">
                          <div class="form-group">
                              <button type="submit" class="btn btn-success" type="submit"><i class="fa fa-save fa-fw"></i> Simpan</button>&nbsp;&nbsp;
                              <a href="{{ route('webpemilik::tenant.index') }}" class="btn btn-warning"><i class="fa fa-reply fa-fw"></i> Kembali</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</main>
@endsection
