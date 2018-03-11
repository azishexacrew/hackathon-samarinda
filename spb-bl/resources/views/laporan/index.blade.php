@extends('_layouts.basic')

@section('script-top')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script-bottom')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2({
        placeholder: "Pilih Tempat",
        allowClear: true
      });
    });
  </script>
@endsection

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
        <div class="card w-100">
          <div class="card-body text-center">
            <h3 class="card-title">Pilih Tempat</h3>
            <form method="GET">

                                    <div class="form-group">
                                        <div class="controls">
                                          <select class="js-example-basic-single form-control" name="tempat" id="area">
                                            <option value="{{ old('area') }}">{{ old('area') }}</option>
                                            <option value="CitraNiaga">Citra Niaga</option>
                                              @foreach($apiPerdaganan as $item)
                                                <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                                             @endforeach

                                          </select>
                                        </div>
                                        <button type="submit" class="btn btn-info m-t-20"><i class="fa fa-search fa-fw"></i> Lihat Laporan</button>
                                    </div>
          </form>
          </div>
        </div>

        <div class="row m-t-40">

          <div class="col-md-12 text-center">
            <h3>Tenant</h3>
            <hr>
          </div>

          <div class="row text-center">
            <div class="col-sm-4">
              <a href="" data-toggle="modal" data-target="#modalStatus">
                <div class="card text-white bg-info mb-3" >
                  <div class="card-body">
                    <h4 class="card-title">500</h4>
                    <h5 class="card-title">Total Tenant</h5>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-sm-4">
              <a href="" data-toggle="modal" data-target="#modalPembayaran">
                <div class="card text-white bg-info mb-3" >
                  <div class="card-body">
                    <h4 class="card-title">{{ count($apiCitra['data']) }}</h4>
                    <h5 class="card-title">Total Yang Disewa</h5>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-sm-4">
              <a href="" data-toggle="modal" data-target="#modalPembayaran">
                <div class="card text-white bg-info mb-3" >
                  <div class="card-body">
                    <h4 class="card-title">{{ 500 - count($apiCitra['data']) }}</h4>
                    <h6 class="card-title">Total Yang Tersedia</h6>
                  </div>
                </div>
              </a>
            </div>


          </div>
          <div class="col-md-12 m-t-40 text-center">
            <h3>Pembayaran</h3>
            <hr>
          </div>

          <div class="col-sm-6">
            <a href="" data-toggle="modal" data-target="#modalPembayaran">
              <div class="card text-white bg-primary mb-3" >
                <div class="card-body">
                  <h4 class="card-title"><i class="fa fa-check fa-fw"></i> 322</h4>
                  <h5 class="card-title">Sudah Bayar</h5>
                </div>
              </div>
            </a>
          </div>

          <div class="col-sm-6">
            <a href="" data-toggle="modal" data-target="#modalPembayaran">
              <div class="card text-white bg-danger mb-3" >
                <div class="card-body">
                  <h4 class="card-title"><i class="fa fa-close fa-fw"></i> {{456-322}}</h4>
                  <h6 class="card-title">Belum Bayar</h6>
                </div>
              </div>
            </a>
          </div>

          {{-- @foreach($apiCitra['data'] as $item)
            <span>{{ $item['nama'] }}</span>
          @endforeach --}}




        </div>

      </div>

    </div>
  </main>
@endsection
