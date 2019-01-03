@extends('template.template')

@section('content')
<div class="form form-biggest">
    <div class="panel">
        <div class="panel panel-heading panel-thread">
            List of User
            <div>
                <button type="submit" class="btn btn-primary">Add new User</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <div class="small-imgcontainer">
                                <img class="image" src="{{asset('images/'.$user->image_url)}}" alt="">
                            </div>
                        </td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->gender}}</td>
                        <td>
                            <form class="form-button" action="{{route('editDeleteUserMaster')}}" method="post">
                                {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
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
