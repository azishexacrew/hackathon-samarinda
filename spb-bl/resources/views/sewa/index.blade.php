@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h5 class="panel-title">Data Sewa</h5>
                  </div>
                  <div class="panel-body">
                      <div class="col-md-4">
                      <div class="pull-left" style="margin-left:-14px;">
                          <form method="GET">
                              <div class="form-group">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="term" placeholder="Cari Nama/Kode Sewa">
                                      <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                      </span>
                                  </div>
                              </div>
                          </form>
                       </div>
                      </div>
                    <div class="pull-right" style="margin-bottom:15px;">
                          <a href="{{ route('webpemilik::sewa.create') }}" class="btn btn-info"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                      </div>
                      <table class="table table-bordered table-condensed table-hover" style="font-size:12px;">
                          <thead>
                            <tr>
                              <th><center>#</center></th>
                              <th>Kode</th>
                              <th>Awal Sewa</th>
                              <th>Akhir Sewa</th>
                              <th>Lama Sewa</th>
                              <th>Pemilik</th>
                              <th>Penyewa</th>
                              <th>Tenant</th>
                              <th align="td-actions"> </th>
                            </tr>
                          </thead>
                          @forelse($sewa as $index => $item)
                          <tbody>
                              <tr>
                                <td align="center">{{ $index+1+(($sewa->CurrentPage()-1)*$sewa->PerPage()) }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->awal }}</td>
                                <td>{{ $item->akhir }}</td>
                                <td>{{ $item->lama }} Hari</td>
                                <td>{{ $item->pemilik->nama }}</td>
                                <td>{{ $item->penyewa->nama }}</td>
                                <td>{{ $item->tenant->area }}</td>
                                <td class="td-actions">
                                    <center>
                                      <a href="{{ url('pemilik/sewa/bukti-sewa', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-print fa-fw"> </i> Cetak</a>
                                        <a href="{{ route('webpemilik::sewa.edit',$item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"> </i></a>
                                        <a href="{{ route('webpemilik::sewa.destroy', $item->id) }}" data-method="DELETE" data-confirm="Apakah anda yakin akan menghapus data sewa : {{ $item->nama}} ?" class="btn btn-danger btn-sm"><i class="fa fa-close"> </i></a>
                                    </center>
                                </td>
                              </tr>
                          </tbody>
                          @empty
                            <td colspan="9" class="text-center">DATA SEWA TIDAK DITEMUKAN</td>
                          @endforelse
                      </table>
                      <div class="pull-right">
                          {{ $sewa->render() }}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</main>
@endsection
