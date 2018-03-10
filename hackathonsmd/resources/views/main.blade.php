<!DOCTYPE html>
<html lang="en">
<head>
	@include('part.header')
</head>
<body background="{{ asset('bg5.jpg') }}">
	@include('part.nav')
	<div class="">
		@include('part.messages')

		@yield('content')

		@include('part.footer')
	</div>
	@include('part.javascript')
	@yield('scripts')
</body>
</html>