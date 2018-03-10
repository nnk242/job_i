<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Animate styles -->
    <link href="{{ asset('animate/animate.css') }}" rel="stylesheet">
    <!-- Common styles -->
    <link href="{{ asset('common/style.css') }}" rel="stylesheet">
    <!-- Font awesome styles -->
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Css -->
    @yield('stylesheet')
</head>
<body>
<div id="app">
@yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('common/js/header.js') }}"></script>

{{--masonry--}}
<script src="{{ asset('masonry/masonry.pkgd.min.js') }}"></script>
<script>
    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
    });
</script>
<!-- animate js -->
<script src="{{ asset('animate/wow.js') }}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>