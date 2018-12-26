@extends('template.template')

@section('content')
<div class = "forum-body">
    <div class = "search-bar">
        <form action = "{{ url('/search') }}" method = "get">
            <input type = "text" name = "name" placeholder = "Search forum by name and category" size = "60">
            <button>Find</button>
        </form>
    </div>
    @forelse($forums as $forum)

        <a href = "#" class = "list-group-item">
            <h4 class = "forumname">{{ $forum->postname }} </h4> 
            <p>---------------------------------------------------------------------------</p>
            <p class = "desc"> {{ str_limit($forum->postdesc, 65) }}</p>
            <br>
            <p>Created at: {{ $forum->forumcreated }}</p>
            <!-- to be continued soon -->
        </a>

    @empty
    <h5> No Threads available </h5>

    @endforelse

<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis blanditiis molestias consequatur numquam totam explicabo placeat fugiat obcaecati officiis tempore sunt reiciendis incidunt pariatur, suscipit ipsum. Temporibus alias minima provident!</p> -->
</div>


@endsection
