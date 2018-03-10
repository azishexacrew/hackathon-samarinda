<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- No Polisi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_polisi', 'No Polisi:') !!}
    {!! Form::number('no_polisi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kendaraan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kendaraan_id', 'Jenis Kendaraan Id:') !!}
    {!! Form::number('jenis_kendaraan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataKendaraans.index') !!}" class="btn btn-default">Cancel</a>
</div>
