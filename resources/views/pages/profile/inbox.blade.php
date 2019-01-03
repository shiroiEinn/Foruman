@extends('template.template')

@section('content')
<div class = "form">   

          @if(count($messages) > 0)
                @foreach ($messages as $message)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-title panel-thread">
                            <div>
                                    <span><a href="{{route('viewProfile',['id' => $message->user->id])}}">{{$message->user->username}}</a></span> <br>
                            {{$message->user->role}} <br>
                            Posted at: {{$message->created_at}} <br>
                            </div>
                            <form action="{{route('deleteMessage')}}" method="post">
                            {{ csrf_field() }}
                                <div>
                                        <input type="hidden" value="{{$message->id}}" name="id">
                                        <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">{{$message->message}}</div>
                    </div>
                @endforeach
                {{$messages->links()}}
          @else
            <div class="nothread">You dont have any message</div>
          @endif
        
           
    </div>
@endsection