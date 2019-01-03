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
        <link rel="stylesheet" href="{{asset('css/icon.css')}}">
        <title>{{config('app.name')}}</title>

    </head>
    @if (Auth::check() && Auth::user()->role == 'user')
        @include('navbar.user-navbar');        
    @elseif(Auth::check() && Auth::user()->role = 'admin')
        @include('navbar.admin-navbar');
    @else
        @include('navbar.guest-navbar');
    @endif
    
    <body>
        @yield('content');
    </body>
</html>
