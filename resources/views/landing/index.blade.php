@extends('_layouts.default')

@section('tubuh')
<div class="container-fluid text-center">
	<div class="h1">Tengger</div>
	<div class="h3">Tempat Manager Untuk Usaha Anda</div>
</div>
<div class="container-fluid">
	<div class="row text-center">
			<a href="{{route('event.index')}}" class="btn btn-lg btn-primary"> Buat Tempat Tenant </a>
			<a href="#" class="btn btn-lg btn-primary">Cari Tempat Tenant</a>
	</div>
</div>
@endsection
