@extends('template.template')

@section('content')
<div class="forum-body">
    @if (count($forums) > 0)
    @foreach ($forums as $forum)
        <div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-7">
                                    <a href="{{route('viewThread',['id'=>$forum->id])}}"><h3 class="pull-left">{{$forum->postname}}</h3></a>
                            </div>
                            @if($forum->poststatus == 'open')
                            <div class="col-sm-5">
                            <form action="{{route('deleteEditForum')}}" method="post">
                                    {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$forum->id}}">
                                <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                                <button type="submit" name="action" value="edit" class="btn btn-warning">Edit</button>
                            </form>
                            
                                    
                                    
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
            <div class="panel-body">
                    Status    : 
                    @if($forum->poststatus == 'open')
                    <span class="label label-success">Open</span>                
                    @else
                        <span class="label label-danger">Closed</span>
                    @endif
            </div>
            
            
            <div class="panel-footer">
                {{$forum->postdesc}}
            </div>
        </div>

        
    @endforeach
    {{$forums->links()}}
    @else
    <p>No post found</p>
    @endif
</div>
@endsection