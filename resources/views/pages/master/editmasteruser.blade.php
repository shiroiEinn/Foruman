@extends('template.template')

@section('content')
    
    <div class="form">
            <h2 class="title">Edit Profile</h2>

            @if(count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    <form action="{{route('doEditUserMaster',['id'=>$user[0]->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            
            <div class="form-group">
                <label>Name</label><span class="required">*</span>
                <input value="{{$user[0]->username}}" type="text" class="form-control" name="name">
            </div>
            <div class = "form-group">
                    <label>Role</label><span class = "required">*</span>
                    <select name = "role" class = "form-control">
                        @foreach ($roles as $role)
                            @if ($role->id == $user[0]->roleid)
                                <option selected="selected" value="{{$role->id}}">{{$role->role}}</option>
                            @endif
                            <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
    
                </div>
    

            <div class="form-group">
                <label>Email</label><span class="required">*</span>
                <input value="{{$user[0]->email}}" type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Confirm Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="confirmPassword" >
            </div>

            <div class="form-group">
                <label>Phone</label><span class="required">*</span>
                <input value="{{$user[0]->phone}}" type="tel" class="form-control" name="phone">
            </div>

            <div class="form-group">
                <label>Gender</label><span class="required">*</span>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked="checked" type="radio" name="gender" value="male">
                        <label class="form-check-label" >Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        @if($user[0]->gender == 'female')
                        <input class="form-check-input" checked="checked" type="radio" name="gender" value="female">
                        @else
                        <input class="form-check-input" type="radio" name="gender" value="female">
                        @endif
                        <label class="form-check-label" >Female</label>
                      </div>
                </div>
            </div>

            <div class="form-group">
                <label>Birthdate</label><span class="required">*</span>
                <input value="{{$user[0]->dob}}" type="date" class="form-control" name="birthdate">
            </div>
            
            <div class="form-group">
                <label>Address</label><span class="required">*</span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{$user[0]->address}}</textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                        <label>Photo</label><span class="required">*</span>
                        <input type="file" class="custom-file-input" name="picture">
                </div>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection