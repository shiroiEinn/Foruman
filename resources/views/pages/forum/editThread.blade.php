@extends('template.template')

@section('content')
    <div class = "form">   

        <div class="panel panel-default">
            <div class="panel-heading">Edit Thread</div>
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
        
                <form method = "post" action = "{{ route('doEditThread',['id' => $thread[0]->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Content</label>
                    <input type="text" value="{{$thread[0]->thread}}" class="form-control" name = "content" placeholder="thread">
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
          </div>


        
    
    
    </div>
@endsection