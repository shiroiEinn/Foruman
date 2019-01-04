@extends('template.template')

@section('content')

<div class = "form">   
        <h2 class = "title">Add New Category</h2>

        @if(count($errors) > 0)
        <div class = "alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method = "post" action = "{{ route('doAddCategoryMaster') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name = "name" aria-describedby="emailHelp" placeholder="Enter category name">
            
            
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        </form>
</div>

<div class="form">
    <div class="panel">
        <div class="panel panel-heading panel-thread">
            List of Category
        </div>
        <div class="panel-body">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->categoryname}}</td>
                        <td>
                            <form class="form-button" action="{{route('editDeleteCategoryMaster',['id'=>$category->id])}}" method="post">
                                {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$category->id}}">
                            
                            <button type="submit" name="action" value="edit" class="btn btn-warning">edit</button>
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
