@extends('template.template')

@section('content')
<div class="form form-biggest">
    <div class="panel">
        <div class="panel panel-heading panel-thread">
            List of Forum
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($forums as $forum)
                    <tr>
                        <td>{{$forum->postname}}</td>
                        <td>{{$forum->category->categoryname}}</td>
                        <td>{{$forum->user->username}}</td>
                        <td>{{$forum->postdesc}}</td>
                        <td>{{$forum->poststatus}}</td>
                        <td>
                            <form class="form-button" action="{{route('closeDeleteForumMaster',['id'=>$forum->id])}}" method="post">
                                {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$forum->id}}">
                            @if ($forum->poststatus == 'close')
                            <button type="submit" name="action" value="close" class="btn btn-danger disabled">close</button>
                            @else
                            <button type="submit" name="action" value="close" class="btn btn-danger">close</button>
                            @endif
                            <button type="submit" name="action" value="delete" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
    

@endsection
