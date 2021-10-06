<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Courier service</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

@include('layouts.app_css')

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>
<body class="page-body skin-white" data-url="http://neon.dev">
<div class="page-container">

    @include('layouts.app_sidebar')
    <div class="main-content">
        @include('layouts.app_header')
        @yield('content')
        @include('layouts.app_footer')
    </div>
</div>
@include('layouts.app_js')
</body>
</html>
