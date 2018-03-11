<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bukti Sewa Tenant &mdash; S.E-Ret System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{ asset('css/print.css') }}">
        <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="text-center">
                <img src="{{ asset('img/logo.png') }}" width="85" class="m-t-20"/>
                <p>
                  <h3>S.E-Ret System</h3>
                    <h5>Samarinda E-Retribusi System</h5>
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-condensed table-sm">
                        <thead>
                            <tr>
                              <td>Kode Sewa</td>
                              <td>:</td>
                              <td>{{ $sewa->kode }}</td>
                            </tr>
                            <tr>
                              <td>Nama Penyewa</td>
                              <td>:</td>
                              <td>{{ $sewa->penyewa->nama }}</td>
                            </tr>
                            <tr>
                              <td>Nama Tenant</td>
                              <td>:</td>
                              <td>{{ $sewa->tenant->area }}</td>
                            </tr>
                            <tr>
                              <td>Tanggal Awal Sewa</td>
                              <td>:</td>
                              <td>{{ $sewa->awal }}</td>
                            </tr>
                            <tr>
                              <td>Tanngal Akhir Sewa</td>
                              <td>:</td>
                              <td>{{ $sewa->akhir }}</td>
                            </tr>
                            <tr>
                              <td>Pemilik Tenant</td>
                              <td>:</td>
                              <td>{{ $sewa->pemilik->name }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-6 m-t-10 text-right">
                    <div class="clearfix">
                        <div class="pull-right barcode-wrapper">
                            <img src='data:image/png;base64,{!! DNS2D::getBarcodePNG($sewa->kode, "QRCODE") !!}' alt="Barcode Kode Sewa" width="130">
                        </div>
                    </div>
                    <h3 style="text-transform:uppercase;letter-spacing:8px;">

                    </h3>
                </div>
            </div>

        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(window).on('load', function(){
            window.print();
        });
    </script>
</html>
