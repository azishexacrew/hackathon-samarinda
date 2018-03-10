<li class="{{ Request::is('dataKendaraans*') ? 'active' : '' }}">
    <a href="{!! route('dataKendaraans.index') !!}"><i class="fa fa-edit"></i><span>Data Kendaraans</span></a>
</li>

<li class="{{ Request::is('jenisKendaraans*') ? 'active' : '' }}">
    <a href="{!! route('jenisKendaraans.index') !!}"><i class="fa fa-edit"></i><span>Jenis Kendaraans</span></a>
</li>

<li class="{{ Request::is('jenisPembayarans*') ? 'active' : '' }}">
    <a href="{!! route('jenisPembayarans.index') !!}"><i class="fa fa-edit"></i><span>Jenis Pembayarans</span></a>
</li>

<li class="{{ Request::is('lahanParkirs*') ? 'active' : '' }}">
    <a href="{!! route('lahanParkirs.index') !!}"><i class="fa fa-edit"></i><span>Lahan Parkirs</span></a>
</li>

<li class="{{ Request::is('transaksis*') ? 'active' : '' }}">
    <a href="{!! route('transaksis.index') !!}"><i class="fa fa-edit"></i><span>Transaksis</span></a>
</li>

