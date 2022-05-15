<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/PietraBianca/public/css/all.css">
    <script defer src="{{ asset('js/app.js') }}" ></script>
</head>
<body>
    @include('inc.header')
    @include('inc.nav')

    @yield('content')
</body>

{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="/js/app.js"></script> --}}

</html>