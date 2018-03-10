@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
  <div class="row">
      <div class="col-md-6 offset-md-3">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Tambah Data Sewa</h3>
              </div>
              <hr>
              <div class="panel-body">
                  @include('_layouts.error')
                  <form action="{{ $action }}" method="POST" class="form-vertical" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="{{ $method }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label class="control-label" for="tgl_sewa">Tanggal Sewa</label>
                          <div class="controls">
                              <input type="date" name="tgl_sewa" placeholder="Tanggal Sewa" class="form-control" id="tgl_sewa" value="{{ old('tgl_sewa') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="lama">Lama</label>
                          <div class="controls">
                              <input type="text" name="lama" placeholder="Lama" class="form-control" id="lama" value="{{ old('Lama') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="akhir">Akhir</label>
                          <div class="controls">
                              <input type="date" name="akhir" placeholder="Akhir" class="form-control" id="akhir" value="{{ old('akhir') }}">
                          </div>
                      </div>

                      </div>

                      <div class="pull-right">
                          <div class="form-group">
                              <button type="submit" class="btn btn-success" type="submit"><i class="fa fa-save fa-fw"></i> Simpan</button>&nbsp;&nbsp;
                              <a href="{{ route('webpemilik::sewa.index') }}" class="btn btn-warning"><i class="fa fa-reply fa-fw"></i> Kembali</a>
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
