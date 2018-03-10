<table class="table table-responsive" id="jenisKendaraans-table">
    <thead>
        <tr>
            <th>Jenis</th>
        <th>Tarif Awal</th>
        <th>Tarif Jam</th>
        <th>Tarif Max</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jenisKendaraans as $jenisKendaraan)
        <tr>
            <td>{!! $jenisKendaraan->jenis !!}</td>
            <td>{!! $jenisKendaraan->tarif_awal !!}</td>
            <td>{!! $jenisKendaraan->tarif_jam !!}</td>
            <td>{!! $jenisKendaraan->tarif_max !!}</td>
            <td>
                {!! Form::open(['route' => ['jenisKendaraans.destroy', $jenisKendaraan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jenisKendaraans.show', [$jenisKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jenisKendaraans.edit', [$jenisKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>