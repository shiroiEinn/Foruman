@extends('template.template')

@section('content')
<div class = "forum-body">
    <div class = "search-bar">
        <form action = "{{ route('homesearch') }}" method = "get">
            <input type = "text" name = "name" placeholder = "Search forum by name and category" size = "60">
            <button>Find</button>
        </form>
    </div>

    @if(Auth::user())
        <div>
            <a href="{{route('addForum')}}">
                <div class="add-container">
                    <div class="plusicon">
                        
                    </div>
                </div>
            </a>
        </div>
    @endif

    @if (count($forums) > 0)
        @foreach ($forums as $forum)
            <div class="panel">
                    <div class="panel-heading">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-9">
                                    <a href="{{route('viewThread',['id'=>$forum->id])}}"><h3 class="pull-left">{{$forum->postname}}</h3></a>
                                </div>
                                <div class="col-sm-3">
                                    <h4 class="pull-right">
                                    <small><em>{{explode(' ',$forum->created_at)[0]}}<br>{{explode(' ',$forum->created_at)[1]}}</em></small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <div class="panel-body">
                        Category    : {{$forum->category->categoryname}} <br>
                        {{$forum->postdesc}}
                </div>
                
                
                <div class="panel-footer">
                    @if($forum->poststatus == 'open')
                        <span class="label label-success">Open</span>                
                    @else
                        <span class="label label-danger">Closed</span>
                    @endif
                </div>
            </div>
        @endforeach
        {{$forums->links()}}
    @else
        <p>No post found</p>
    @endif

    

<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis blanditiis molestias consequatur numquam totam explicabo placeat fugiat obcaecati officiis tempore sunt reiciendis incidunt pariatur, suscipit ipsum. Temporibus alias minima provident!</p> -->
</div>


@endsection
