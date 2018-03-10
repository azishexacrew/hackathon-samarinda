<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transaksi->id !!}</p>
</div>

<!-- Check Out Field -->
<div class="form-group">
    {!! Form::label('check_out', 'Check Out:') !!}
    <p>{!! $transaksi->check_out !!}</p>
</div>

<!-- User Jukir Id Field -->
<div class="form-group">
    {!! Form::label('user_jukir_id', 'User Jukir Id:') !!}
    <p>{!! $transaksi->user_jukir_id !!}</p>
</div>

<!-- Data Kendaraan Id Field -->
<div class="form-group">
    {!! Form::label('data_kendaraan_id', 'Data Kendaraan Id:') !!}
    <p>{!! $transaksi->data_kendaraan_id !!}</p>
</div>

<!-- Lahan Parkir Id Field -->
<div class="form-group">
    {!! Form::label('lahan_parkir_id', 'Lahan Parkir Id:') !!}
    <p>{!! $transaksi->lahan_parkir_id !!}</p>
</div>

<!-- Jenis Pembayaran Id Field -->
<div class="form-group">
    {!! Form::label('jenis_pembayaran_id', 'Jenis Pembayaran Id:') !!}
    <p>{!! $transaksi->jenis_pembayaran_id !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $transaksi->total !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaksi->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $transaksi->deleted_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaksi->updated_at !!}</p>
</div>

