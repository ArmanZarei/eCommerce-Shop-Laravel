<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eCommerce Shop - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/common/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/bootstrap.min.css') }}">
    @stack('styles')
</head>
<body>

@include('front.partials.navbar')

@yield('content')

<script src="{{ asset('js/common/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
