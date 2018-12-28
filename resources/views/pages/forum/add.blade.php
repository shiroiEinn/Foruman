@extends('template.template')

@section('content')
    <div class = "form">   

        <div class="panel panel-default">
            <div class="panel-heading">Post New Forum</div>
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
        
                <form method = "post" action = "{{ route('doAddForum') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name = "name" placeholder="Forum title">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="form-control" name="category">
                            <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" rows="3" name="desc"></textarea>
                </div>
                
                <button type="submit" name = "Add" value = "Add" class="btn btn-primary">Add</button>
                </form>
            </div>
          </div>


        
    
    
    </div>
@endsection