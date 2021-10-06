<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daily</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="description" content="Courier Delivery Service HTML Template">
	<meta name="keywords" content="cargo, courier, delivery, freight, logistics, mover, moving company, packaging, responsive, shipment, shipping, transport, warehouse">

    {{-- <link rel="apple-touch-icon" href="/{{ $details->favicon ? $details->favicon : 'frontend_assets/assets/img/logo.jpg' }}"> --}}
    <link rel="apple-touch-icon" href="{{$appsetting->fav_icon ? '/' . $appsetting->fav_icon : '\assets\images\highlights-2-1-icheck.png'}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{$appsetting->fav_icon ? '/' . $appsetting->fav_icon : '\assets\images\highlights-2-1-icheck.png'}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

@include('frontend.layouts.app_css')

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>
<body class="page-body skin-white" data-url="http://neon.dev">
<div class="page-container">

    @include('frontend.layouts.app_top_header')
    @include('frontend.layouts.app_header')
    {{-- @include('frontend.layouts.app_shoppingcart') --}}
    @yield('frontendcontent')

    @include('frontend.layouts.app_footer')
</div>
@include('frontend.layouts.app_js')
</body>
</html>
