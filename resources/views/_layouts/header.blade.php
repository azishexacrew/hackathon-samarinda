
<nav class="navbar navbar-default" style="margin-bottom:0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{asset('image/Logo.png')}}" class="img-responsive" alt="Responsive image" height="100" width="100">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if (Illuminate\Support\Facades\Auth::check())
          <li class="active"><a href="{{asset('/')}}">Halalam Depan <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Profil </a></li>
          <li><a href="#">Profil Tenant </a></li>
          <li><a href="#">Manage Tenant </a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (! Illuminate\Support\Facades\Auth::check())
          <li><a href="{{route('loginn.index')}}">Login</a></li>
          <li><a href="{{route('registerr.index')}}">Register</a> </li>
        @endif
        @if (Illuminate\Support\Facades\Auth::check())
          {{-- <li><a href="{{route('pengaturan.index')}}">Pengaturan</a></li> --}}
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Akun <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{route('pengaturan.index')}}">Pengaturan</a></li>
              <li><a href="{{route('loginn.logout')}}">Logout</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
