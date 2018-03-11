<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    S.E-Ret System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i></a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tenant&nbsp;</a>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a class="dropdown-item" href="#">Tenant</a>
                            </div>
                        </li> --}}
                        @if(Auth::check())
                          @if(Auth::user()->level == 'SuperAdmin')
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('tenant') }}"><i class="fa fa-industry fa fw"></i> Tenant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('tenant') }}">Administrasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('tenant') }}">Laporan</a>
                            </li>
                          @endif
                          @if(Auth::user()->level == 'Pemilik')
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('tenant') }}"><i class="fa fa-industry fa fw"></i> Tenant</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('pemilik/tenant') }}"><i class="fa fa-plus-square fa-fw"></i> Buat Tenant</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square fa-fw"></i> Penyewa&nbsp;</a>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a class="dropdown-item" href="{{ url('pemilik/penyewa') }}">Buat Penyewa</a>
                                  <a class="dropdown-item" href="{{ url('pemilik/sewa') }}">Buat Sewa</a>
                                </div>
                            </li>
                          @endif

                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
                        @else
                          @if(Auth::user()->level == 'SuperAdmin')

                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square"></i> &nbsp;Pemilik&nbsp;</a>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="{{ url('sitemanager/data-pemilik') }}">Buat Data</a>
                              </div>
                          </li>

                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
