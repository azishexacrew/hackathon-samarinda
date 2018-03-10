@extends('_layouts.basic')

@section('script-top')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('script-bottom')
  <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
  <script>
  $(document).ready(function() {

  $( "#startdate,#enddate" ).datepicker({
  changeMonth: true,
  changeYear: true,
  firstDay: 1,
  dateFormat: 'dd/mm/yy',
  })

  $( "#startdate" ).datepicker({ dateFormat: 'dd-mm-yy' });
  $( "#enddate" ).datepicker({ dateFormat: 'dd-mm-yy' });

  $('#enddate').change(function() {
  var start = $('#startdate').datepicker('getDate');
  var end   = $('#enddate').datepicker('getDate');

  if (start<end) {
  var days   = (end - start)/1000/60/60/24;
  $('#days').val(days);
  }
  else {
  alert ("Data yang dipilih harus lebih dari tanggal awal");
  $('#startdate').val("");
  $('#enddate').val("");
  $('#days').val("");
  }
  }); //end change function
  }); //end ready
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2({
        placeholder: "Pilih Penyewa",
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
                            <input type="text" name="tgl_sewa" placeholder="Awal" class="form-control" id="startdate" value="{{ old('awal') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="lama">Tanggal Akhir</label>
                          <div class="controls">
                              <input type="text" name="akhir" placeholder="Akhir" class="form-control" id="enddate" value="{{ old('akhir') }}">

                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="akhir">Total Hari</label>
                          <div class="controls">
                            <input type="text" name="lama" placeholder="Lama" class="form-control" id="days" value="{{ old('lama') }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label" for="penyewa_id">Penyewa</label>
                          <div class="controls">
                            <select class="js-example-basic-single form-control" name="penyewa_id" id="penyewa_id">
                              <option value="{{ old('area') }}">{{ old('area') }}</option>
                                @foreach($penyewa as $item)
                                  <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                               @endforeach
                            </select>
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
