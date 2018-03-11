<li class="{{  Request::is('roles*')||Request::is('permissions*')||Request::is('user_role*')||Request::is('users*') ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-cog"></i> <span>Pengaturan Role & User</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-sun-o"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('user_role*') ? 'active' : '' }}">
            <a href="{!! route('user_role.index') !!}"><i class="fa fa-object-group"></i><span>User Role</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('bankSampahs*') ? 'active' : '' }}">
    <a href="{!! route('bankSampahs.index') !!}"><i class="fa fa-edit"></i><span>Bank Sampah</span></a>
</li>

<li class="{{ Request::is('jenisSampahs*') ? 'active' : '' }}">
    <a href="{!! route('jenisSampahs.index') !!}"><i class="fa fa-edit"></i><span>Jenis Sampah</span></a>
</li>

<li class="{{ Request::is('kurirSampahs*') ? 'active' : '' }}">
    <a href="{!! route('kurirSampahs.index') !!}"><i class="fa fa-edit"></i><span>Kurir Sampah</span></a>
</li>

<li class="{{ Request::is('markets*') ? 'active' : '' }}">
    <a href="{!! route('markets.index') !!}"><i class="fa fa-edit"></i><span>Market</span></a>
</li>

<li class="{{ Request::is('petugas*') ? 'active' : '' }}">
    <a href="{!! route('petugas.index') !!}"><i class="fa fa-edit"></i><span>Petugas</span></a>
</li>

<li class="{{ Request::is('transaksiSampahs*') ? 'active' : '' }}">
    <a href="{!! route('transaksiSampahs.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Sampah</span></a>
</li>

<li class="{{ Request::is('transaksiSampahDetils*') ? 'active' : '' }}">
    <a href="{!! route('transaksiSampahDetils.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Sampah Detil</span></a>
</li>

<li class="{{ Request::is('transaksiTukarpoins*') ? 'active' : '' }}">
    <a href="{!! route('transaksiTukarpoins.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Tukar poin</span></a>
</li>

<li class="{{ Request::is('kecamatans*') ? 'active' : '' }}">
    <a href="{!! route('kecamatans.index') !!}"><i class="fa fa-edit"></i><span>Kecamatans</span></a>
</li>

