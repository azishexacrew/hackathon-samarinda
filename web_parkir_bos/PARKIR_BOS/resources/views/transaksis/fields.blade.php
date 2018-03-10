<!-- Check Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_out', 'Check Out:') !!}
    {!! Form::date('check_out', null, ['class' => 'form-control']) !!}
</div>

<!-- User Jukir Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_jukir_id', 'User Jukir Id:') !!}
    {!! Form::number('user_jukir_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Kendaraan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_kendaraan_id', 'Data Kendaraan Id:') !!}
    {!! Form::number('data_kendaraan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lahan Parkir Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lahan_parkir_id', 'Lahan Parkir Id:') !!}
    {!! Form::number('lahan_parkir_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayaran Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pembayaran_id', 'Jenis Pembayaran Id:') !!}
    {!! Form::number('jenis_pembayaran_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksis.index') !!}" class="btn btn-default">Cancel</a>
</div>
