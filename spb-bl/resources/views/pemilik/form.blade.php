@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
  <div class="row">
      <div class="col-md-6 offset-md-3">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Tambah Data Pemilik</h3>
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

                      @csrf

                      <div class="form-group">
                          <label for="name" class="control-label">Username</label>

                          <div class="controls">
                              <input id="name" type="text" placeholder="Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group ">
                          <label for="email" class="control-label" for="email">E-Mail Address</label>

                          <div class="controls">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password" class="control-label">Password</label>

                          <div class="controls">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password-confirm" class="control-label">Konfirmasi Password</label>

                          <div class="controls">
                              <input id="password-confirm" placeholder="Konfirmasi Password" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>

                      <div class="pull-right">
                          <div class="form-group">
                              <button type="submit" class="btn btn-success" type="submit"><i class="fa fa-save fa-fw"></i> Simpan</button>&nbsp;&nbsp;
                              <a href="{{ route('web::data-pemilik.index') }}" class="btn btn-warning"><i class="fa fa-reply fa-fw"></i> Kembali</a>
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
