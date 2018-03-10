<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="rezapadillah">
    <title>S.E-Ret System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('script-top')
</head>
<body>
        @include('_layouts.navbar')
        <div class="clearfix"></div>
        @yield('content')

    <!-- Scripts -->
    <script type="text/javascript">
        var csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script-bottom')
</body>
</html>
