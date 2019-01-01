@extends('template.template')

@section('content')
    <div class = "form">   
        <h2 class = "title">Login</h2>

        @if(count($errors) > 0)
        <div class = "alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method = "post" action = "{{ route('doLogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label >Email address</label>
            <input value="{{Cookie::get('email')}}" type="email" class="form-control" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label >Password</label>
            <input value="{{Cookie::get('password')}}" type="password" class="form-control" name = "password" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberMe">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>
        <button type="submit" name = "login" value = "Login" class="btn btn-primary">Login</button>
        </form>
    
    
    </div>
@endsection