<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/spin.css" rel="stylesheet">
    <link href="/css/lib.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    @yield('stylesheet')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    @include('layouts.menu')

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/dropzone.js"></script>
<script src="/js/set-rows.js"></script>
@yield('javascript')

</body>
</html>
