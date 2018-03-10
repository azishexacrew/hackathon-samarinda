<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::text('jenis', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarif Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarif_awal', 'Tarif Awal:') !!}
    {!! Form::number('tarif_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarif Jam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarif_jam', 'Tarif Jam:') !!}
    {!! Form::number('tarif_jam', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarif Max Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarif_max', 'Tarif Max:') !!}
    {!! Form::number('tarif_max', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jenisKendaraans.index') !!}" class="btn btn-default">Cancel</a>
</div>
