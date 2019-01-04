@extends('template.template')

@section('content')

<div class = "form">   
        <h2 class = "title">Edit Category</h2>

        @if(count($errors) > 0)
        <div class = "alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action = "{{ route('doEditCategoryMaster',['id'=>$category[0]->id]) }}" method = "post" >
        {{ csrf_field() }}
        <div class="form-group">
            <label >Name</label>
            <input value="{{$category[0]->categoryname}}"  type="text" class="form-control" name = "name" aria-describedby="emailHelp">
            
            
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
</div>

@endsection
