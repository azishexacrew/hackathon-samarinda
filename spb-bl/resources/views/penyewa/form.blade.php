@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
  <div class="row">
      <div class="col-md-6 offset-md-3">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Tambah Data Penyewa</h3>
              </div>
              <hr>
              <div class="panel-body">
                  @include('_layouts.error')
                  <form action="{{ $action }}" method="POST" class="form-vertical" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="{{ $method }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label class="control-label" for="nama">Nama</label>
                          <div class="controls">
                              <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama" value="{{ old('nama') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="no_telp">No. Telepon</label>
                          <div class="controls">
                              <input type="text" name="no_telp" placeholder="No. Telepon" class="form-control" id="no_telp" value="{{ old('no_telp') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="alamat">Alamat</label>
                          <div class="controls">
                              <textarea name="alamat" placeholder="Alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" id="exampleTextarea" rows="3">{{old('alamat')}}</textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="jk">Jenis Kelamin</label>
                          <div class="controls">
                            <select class="form-control" name="jk" id="jk">
                              <option value="N">Pilih Jenis Kelamin</option>
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="tmpt_lahir">Tempat Lahir</label>
                          <div class="controls">
                              <input type="text" name="tmpt_lahir" placeholder="Tempat Lahir" class="form-control" id="tmpt_lahir" value="{{ old('tmpt_lahir') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                          <div class="controls">
                              <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="no_identitas">No Identitas</label>
                          <div class="controls">
                              <input type="text" name="no_identitas" placeholder="No Identitas" class="form-control" id="no_identitas" value="{{ old('no_identitas') }}">
                          </div>
                      </div>


                      <div class="pull-right">
                          <div class="form-group">
                              <button type="submit" class="btn btn-success" type="submit"><i class="fa fa-save fa-fw"></i> Simpan</button>&nbsp;&nbsp;
                              <a href="{{ route('webpemilik::penyewa.index') }}" class="btn btn-warning"><i class="fa fa-reply fa-fw"></i> Kembali</a>
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
