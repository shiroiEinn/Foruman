<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/navbarActivator.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name')}}</title>

    </head>
    @include('navbar.guest-navbar');
    <body>
        @yield('content');
    </body>
</html>
