<table class="table table-responsive" id="lahanParkirs-table">
    <thead>
        <tr>
            <th>Jenis Kendaraan Id</th>
        <th>Nama</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Jumlah</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lahanParkirs as $lahanParkir)
        <tr>
            <td>{!! $lahanParkir->jenis_kendaraan_id !!}</td>
            <td>{!! $lahanParkir->nama !!}</td>
            <td>{!! $lahanParkir->longitude !!}</td>
            <td>{!! $lahanParkir->latitude !!}</td>
            <td>{!! $lahanParkir->jumlah !!}</td>
            <td>
                {!! Form::open(['route' => ['lahanParkirs.destroy', $lahanParkir->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lahanParkirs.show', [$lahanParkir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lahanParkirs.edit', [$lahanParkir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>