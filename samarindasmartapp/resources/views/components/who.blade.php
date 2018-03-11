@if(Auth::guard('web')->check())
	<p class="text-success">
		Selamat Datang <strong>{{ Auth::user()->name }}</strong>, Silahkan pilih menu-menu diatas
	</p>
@endif

@if(Auth::guard('admin')->check())
	<p class="text-success">
		You are logged in as a <strong>{{ Auth::user()->name }}</strong>
	</p>
@endif