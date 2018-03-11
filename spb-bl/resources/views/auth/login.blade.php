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
  <div id="particles-js"></div>
  <div class="cek-data" style="position:fixed;float:left;margin-left:0px;margin-top:55px;">
    <a href="{{url('tenant')}}" class="btn btn-outline-primary hover-cek-data" style="color: #4272d7 !important; background:#fff !important;border-radius:0px !important;"><i class="fa fa-industry fa-fw"></i>&nbsp; Cek Data Tenant</a>
  </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-35 p-b-25">
			<form class="login100-form validate-form" method="post" action="{{ route('login') }}">
          <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo S.E-Ret System" width="100">
          </div>
					<span class="login100-form-title m-t-10 p-b-33">
						S.E-Ret System
					</span>
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

				<div class="wrap-input100 m-t-20">
						<button type="submit" class="login100-form-btn">
							<i class="fa fa-sign-in fa-fw"></i> &nbsp; Sign in
						</button>
					</div>

					<div class="text-center p-t-35 p-b-2">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" integrity="sha256-+u54FaX9J+k40eAcg5K2YzICSQjrEYBI9gju5nE3HfY=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            particlesJS.load('particles-js', 'json/particles.json', function() {
              console.log('callback - particles.js config loaded');
          });
       });
    </script>
</body>
</html>
