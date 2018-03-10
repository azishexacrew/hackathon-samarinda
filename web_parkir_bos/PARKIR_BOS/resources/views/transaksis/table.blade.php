<table class="table table-responsive" id="transaksis-table">
    <thead>
        <tr>
            <th>Check Out</th>
        <th>User Jukir Id</th>
        <th>Data Kendaraan Id</th>
        <th>Lahan Parkir Id</th>
        <th>Jenis Pembayaran Id</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transaksis as $transaksi)
        <tr>
            <td>{!! $transaksi->check_out !!}</td>
            <td>{!! $transaksi->user_jukir_id !!}</td>
            <td>{!! $transaksi->data_kendaraan_id !!}</td>
            <td>{!! $transaksi->lahan_parkir_id !!}</td>
            <td>{!! $transaksi->jenis_pembayaran_id !!}</td>
            <td>{!! $transaksi->total !!}</td>
            <td>
                {!! Form::open(['route' => ['transaksis.destroy', $transaksi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transaksis.show', [$transaksi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transaksis.edit', [$transaksi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>