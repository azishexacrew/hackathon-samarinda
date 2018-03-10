@extends('layouts.app')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset ('mysetting/css/pengguna_index.css') }}"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Semua Ruko</strong>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nomor Ruko</th>
                        <th>Blok Ruko</th>
                        <th>Hara Sewa/Tahun (Rp)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>

                    <tbody>
                        <?php $x=1;?>
                        @foreach ($rukos as $data)
                        <tr>
                            <th>{{ $x++ }}</th>
                            <td>{{ $data->nomor_ruko }}</td>
                            <td>{!! $data->blok_ruko !!}</td>
                            <td>{{ $data->harga_sewa_per_tahun }}</td>
                            <td>Disewa</td>
                            <td><a href="{{ url('pengguna/'.$data->slug) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                        <div class="text-center">
                            {!! $rukos->links(); !!}
                        </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>Semua Kios</strong>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nomor Kios</th>
                        <th>Blok Kios</th>
                        <th>Harga Sewa/Tahun</th>
                        <th>Aksi</th>
                    </thead>

                    <tbody>
                        <?php $x=1;?>
                        @foreach ($kios as $data)
                        <tr>
                            <th>{{ $x++ }}</th>
                            <td>{{ $data->nomor_kios }}</td>
                            <td>{!! $data->blok_kios !!}</td>
                            <td>{{ $data->harga_sewa_per_tahun }}</td>
                            <td><a href="{{ url('penggunaa/'.$data->slug) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                        <div class="text-center">
                            {!! $kios->links(); !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection