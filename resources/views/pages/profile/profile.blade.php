@extends('template.template')

@section('content')
<div class = "form form-profile">   

        <div class="panel panel-default">
            
                <div class="panel-heading profile-container">
                    <div>
                        <img class="profile-image" src="{{asset('images/'.$user[0]->image_url)}}" alt="">
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading borderless panel-thread">
                            
                                <div class="category">
                                    Name        <br>
                                    Popularity  <br> 
                                    Email       <br>
                                    Phone       <br>
                                    BirthDay    <br>
                                    Gender      <br>
                                    Address     <br>
                                </div>
                                <div>
                                    {{$user[0]->username}} <br>
                                    <span class="label label-success">{{$counter['upvote']}}</span> <span class="label label-danger">{{$counter['downvote']}}</span>  <br> 
                                    {{$user[0]->email}} <br>
                                    {{$user[0]->phone}} <br>
                                    {{$user[0]->dob}} <br>
                                    {{$user[0]->gender}} <br>
                                    {{$user[0]->address}} <br>
                                </div>
                        </div>
                        <div class="panel-body">
                            @if(Auth::user()->id != $user[0]->id)
                                <form action="{{route('popularityProfile',['id'=>$user[0]->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="panel panel-default">
                                        <div class="panel-heading profile-container">
                                            Give Popularity
                                        </div>
                                        <div class="panel-body">
                                            @if(!$popularity->isEmpty() && $popularity[0]->popularity == '1')
                                            <button type="submit" name="action" value="positive-s" class="btn success-selected">+1</button>
                                            @else
                                            <button type="submit" name="action" value="positive" class="btn btn-success">+</button>
                                            @endif
                                            
                                            @if(!$popularity->isEmpty() && $popularity[0]->popularity == '-1')
                                            <button type="submit" name="action" value="negative-s" class="btn danger-selected">-1</button>
                                            @else
                                            <button type="submit" name="action" value="negative" class="btn btn-danger">-</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{route('editProfile')}}" method="get">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            @endif
                        </div>
                        
                    </div>
                </div>
        </div>

        @if(Auth::user()->id != $user[0]->id)
        <div class="panel panel-default">
                <form action="{{route('addThread')}}" method="post">
                    {{csrf_field()}}
                    <div class="panel-body">
                            @if(count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <div class="form-group">
                            <label >Message</label>
                            <textarea class="form-control" rows="2" name="content"></textarea>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
                
          </div>
          @endif
    
    </div>
@endsection