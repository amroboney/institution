<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome2/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts/glyphicons-halflings-regular.eot') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="dashboard">
    <p class="big_dash">مركز الكس لتدريب الحاسوب وتقنية المعلومات</p>
    <p class="small_dash">Alex Center for Computer Training and Information Technology</p>
    </div><!--end of dashboard-->

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
