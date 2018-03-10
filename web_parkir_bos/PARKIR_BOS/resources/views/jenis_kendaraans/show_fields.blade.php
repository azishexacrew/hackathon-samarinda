<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jenisKendaraan->id !!}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <p>{!! $jenisKendaraan->jenis !!}</p>
</div>

<!-- Tarif Awal Field -->
<div class="form-group">
    {!! Form::label('tarif_awal', 'Tarif Awal:') !!}
    <p>{!! $jenisKendaraan->tarif_awal !!}</p>
</div>

<!-- Tarif Jam Field -->
<div class="form-group">
    {!! Form::label('tarif_jam', 'Tarif Jam:') !!}
    <p>{!! $jenisKendaraan->tarif_jam !!}</p>
</div>

<!-- Tarif Max Field -->
<div class="form-group">
    {!! Form::label('tarif_max', 'Tarif Max:') !!}
    <p>{!! $jenisKendaraan->tarif_max !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jenisKendaraan->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $jenisKendaraan->deleted_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jenisKendaraan->updated_at !!}</p>
</div>

