@extends('_layouts.basic')

@section('content')
  <main class="py-4">
    <div class="col-md-12">

      <div class="container m-t-90">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h5 class="panel-title">Data Pemilik</h5>
                  </div>
                  <div class="panel-body">
                      <div class="col-md-4">
                      <div class="pull-left" style="margin-left:-14px;">
                          <form method="GET">
                              <div class="form-group">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="term" placeholder="Cari Nama/Kode Pemilik">
                                      <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                      </span>
                                  </div>
                              </div>
                          </form>
                       </div>
                      </div>
                    <div class="pull-right" style="margin-bottom:15px;">
                          <a href="{{ route('web::pemilik.create') }}" class="btn btn-info"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                      </div>
                      <table class="table table-bordered table-condensed table-hover" style="font-size:12px;">
                          <thead>
                            <tr>
                              <th><center>#</center></th>
                              <th>Nama</th>
                              <th>No. Telepon</th>
                              <th>Alamat</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Tanggal Lahir</th>
                              <th>No Identitas</th>
                              <th align="td-actions"> </th>
                            </tr>
                          </thead>
                          @forelse($pemilik as $index => $item)
                          <tbody>
                              <tr>
                                <td align="center">{{ $index+1+(($pemilik->CurrentPage()-1)*$pemilik->PerPage()) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                  @if($item->jk=='L')
                                    Laki-Laki
                                  @elseif($item->jk=='P')
                                    Perempuan
                                  @endif
                                </td>
                                <td>{{ $item->tmpt_lahir }}, {{$item->tgl_lahir}}</td>
                                <td>{{ $item->no_identitas }}</td>
                                <td class="td-actions">
                                    <center>
                                        <a href="{{ route('web::pemilik.edit',$item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"> </i></a>
                                        <a href="{{ route('web::pemilik.destroy', $item->id) }}" data-method="DELETE" data-confirm="Apakah anda yakin akan menghapus data pemilik : {{ $item->nama}} ?" class="btn btn-danger btn-sm"><i class="fa fa-close"> </i></a>
                                    </center>
                                </td>
                              </tr>
                          </tbody>
                          @empty
                            <td colspan="7" class="text-center">DATA ORANG TIDAK DITEMUKAN</td>
                          @endforelse
                      </table>
                      <div class="pull-right">
                          {{ $pemilik->render() }}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</main>
@endsection
