<table class="table table-responsive" id="dataKendaraans-table">
    <thead>
        <tr>
            <th>Users Id</th>
        <th>No Polisi</th>
        <th>Jenis Kendaraan Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataKendaraans as $dataKendaraan)
        <tr>
            <td>{!! $dataKendaraan->users_id !!}</td>
            <td>{!! $dataKendaraan->no_polisi !!}</td>
            <td>{!! $dataKendaraan->jenis_kendaraan_id !!}</td>
            <td>
                {!! Form::open(['route' => ['dataKendaraans.destroy', $dataKendaraan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataKendaraans.show', [$dataKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataKendaraans.edit', [$dataKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>