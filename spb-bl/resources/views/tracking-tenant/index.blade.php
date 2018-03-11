@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
        <div class="card w-100">
          <div class="card-body text-center">
            <h3 class="card-title">Cek Data Tenant</h3>
            <form method="GET">
            <div class="input-group mb-3">

                <input type="text" name="term" value="{{ request('term') }}" class="form-control form-control-lg" placeholder="Kode Sewa" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-fw"></i> Cari</button>
                </div>

            </div>
          </form>
          </div>
        </div>

        <div class="row m-t-40">


        @if(!is_null($term))

        @forelse($sewa as $index => $item)
          <div class="col-md-12">
            <div class="alert alert-dismissible alert-info text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><i class="fa fa-check fa-fw"></i> Kode Sewa : <u>{{$item->kode}}</u> Ditemukan!</strong>
          </div>


            <div class="row text-center">
              <div class="col-sm-6">
                <a href="" data-toggle="modal" data-target="#modalStatus">
                  <div class="card text-white bg-info mb-3" >
                    <div class="card-body">
                      <h1 class="card-title"><i class="fa fa-list-alt"></i></h1>
                      <h5 class="card-title">Info & Status</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-6">
                <a href="" data-toggle="modal" data-target="#modalPembayaran">
                  <div class="card text-white bg-info mb-3" >
                    <div class="card-body">
                      <h1 class="card-title"><i class="fa fa-money"></i></h1>
                      <h5 class="card-title">Pembayaran</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <!-- Modal Status -->


            <div class="modal fade" id="modalStatus">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Info & Status : <u>{{ $item->kode }}</u></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <table class="table table-condensed table-sm">
                        <thead>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td>{{ $item->penyewa->nama }}</td>
                            </tr>
                            <tr>
                              <td>Tenant</td>
                              <td>:</td>
                              <td>{{ $item->tenant->area }}</td>
                            </tr>
                            <tr>
                              <td>Block - Nomor</td>
                              <td>:</td>
                              <td>{{ $item->tenant->blok }} &mdash; {{ $item->tenant->nomor }}</td>
                            </tr>
                            <tr>
                              <td>Harga</td>
                              <td>:</td>
                              <td>Rp. {{ $item->tenant->harga }}</td>
                            </tr>
                            <tr>
                              <td>Lokasi</td>
                              <td>:</td>
                              <td>Citra Niaga</td>
                            </tr>
                        </thead>
                    </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>

            <!-- Modal Pembayaran -->

            <div class="modal fade" id="modalPembayaran">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Info & Status : <u>{{ $item->kode }}</u></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <table class="table table-condensed table-sm">
                        <thead>
                            <tr>
                              <td>Nama Pemilik</td>
                              <td>:</td>
                              <td>{{ $item->pemilik->nama }}</td>
                            </tr>
                            <tr>
                              <td>Bank</td>
                              <td>:</td>
                              <td>{{ $item->pemilik->bank }}</td>
                            </tr>
                            <tr>
                              <td>No. Rekening</td>
                              <td>:</td>
                              <td>{{ $item->pemilik->no_rek }}</td>
                            </tr>
                            <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-close fa-fw"></i> Belum Dibayar</button> </td>
                            </tr>
                        </thead>
                    </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>

        @empty

          <div class="col-md-12">
            <div class="alert alert-dismissible alert-danger text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><i class="fa fa-exclamation-triangle fa-fw"></i> Kode Tidak Ditemukan!</strong>
          </div>

        @else

        @endif

        @endforelse


        </div>

      </div>

    </div>
  </main>
@endsection
