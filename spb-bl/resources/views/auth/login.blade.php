<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="rezapadillah">
    <title>S.E-Ret System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
			<form class="login100-form validate-form" method="post" action="{{ route('login') }}">
					<span class="login100-form-title p-b-33">
						S.E-Ret System
					</span>
          <small></small>
				{{ csrf_field() }}
				@if($errors->any())
				<div class="alert alert-danger text-center" role="alert">
				@if($errors->count() > 1)
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				@else
					{{ $errors->first() }}
				@endif
				</div>
				@endif
				<div class="wrap-input100 validate-input">
					<input type="text" id="email" name="email" class="input100" placeholder="Email" required autofocus value="{{ old('email') }}">
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<input type="password" id="password" name="password" class="input100" placeholder="Password" required>
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							&copy; 2018 SPB-BL &mdash; Samarinda E-Retribution System
						</span>
					</div>
			</form>

			</div>
		</div>
	</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
