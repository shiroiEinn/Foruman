@extends('template.template');

@section('content')
    @if(isset(Auth::user()->email))
        <strong>Welcome {{ Auth::user()->email }}</strong><br>
        <a href = "{{ url('/home/logout') }}"> Logout </a>
    else
        <script>window.location = "/home";</script>
        
@endsection