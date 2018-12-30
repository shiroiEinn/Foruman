@extends('template.template')

@section('content')
    <div class = "form">   

        <div class="panel panel-default">
            <div class="panel-heading">Edit Forum</div>
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
        
                <form method = "post" action = "{{ route('doEditForum',['id' => $forum[0]->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$forum[0]->postname}}" class="form-control" name = "name" placeholder="Forum title">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="form-control" name="category">
                            <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            @if ($category->id == $forum[0]->categoryid)
                            <option value="{{$category->id}}" selected="selected">{{$category->categoryname}}</option>
                            @endif
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea  class="form-control" rows="3" name="desc">{{$forum[0]->postdesc}}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
          </div>


        
    
    
    </div>
@endsection