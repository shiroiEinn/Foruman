@extends('template.template')

@section('content')
<div class = "form">   

        <div class="panel panel-default">
            <div class="panel-heading panel-title">{{$forum[0]->postname}}
                <div class="pull-right">
                    @if($forum[0]->poststatus == 'open')
                    <span class="label label-success">Open</span>                
                    @else
                        <span class="label label-danger">Closed</span>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                
        
                Category    : {{$forum[0]->category->categoryname}} <br>
                Owner       : {{$forum[0]->user->username}} <br>
                Posted At   : {{$forum[0]->created_at}} <br>
                
            </div>
            <div class="panel-footer">
                {{$forum[0]->postdesc}}
                <form action="{{route('searchThread')}}">
                {{ csrf_field() }}
                    <div class="form-group threadsearch">
                        <input  type="text" class="form-control searchbox" name = "search" placeholder="Search...">
                        <button class="searchcontainer" type="submit"><div class="searchicon"></div></button>
                        
                    </div>
                </form>
            </div>
          </div>

          @if(count($threads) > 0)
                @foreach ($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-title panel-thread">
                            {{$thread->user->username}} <br>
                            {{$thread->user->role}} <br>
                            Posted at: {{$thread->created_at}} <br>
                            @if($thread->userid == Auth::user()->id)
                            <form action="{{route('deleteEditThread')}}" method="post">
                            {{ csrf_field() }}
                                <div>
                                        <input type="hidden" value="{{$thread->id}}" name="id">
                                        <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                                        <button type="submit" name="action" value="edit" class="btn btn-warning">Edit</button>
                                </div>
                            </form>
                            @endif
                        </div>
                        <div class="panel-footer">{{$thread->thread}}</div>
                    </div>
                @endforeach
          @else
            <div class="nothread">This forum doesnt have any thread</div>
          @endif
        

          @if(Auth::check() && $forum[0]->poststatus == 'open')
          <div class="panel panel-default">
                <div class="panel-heading panel-title">Post New Thread</div>
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
                            <label >Content</label>
                            <input type="hidden" value="{{$forum[0]->id}}" name="forumid">
                            <textarea class="form-control" rows="2" name="content"></textarea>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </form>
                
          </div>
          @endif
    
    </div>
@endsection