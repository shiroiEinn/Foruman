@extends('template.template')

@section('content')
    

    <div class="form">
            <h2 class="title">Register</h2>
        <form action="/products" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label>Name</label><span class="required">*</span>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Email</label><span class="required">*</span>
                <input type="email" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Confirm Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Phone</label><span class="required">*</span>
                <input type="tel" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Gender</label><span class="required">*</span>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="male">
                        <label class="form-check-label" >Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="female">
                        <label class="form-check-label" >Female</label>
                      </div>
                </div>
            </div>

            <div class="form-group">
                <label>Birthdate</label><span class="required">*</span>
                <input type="date" class="form-control" name="name">
            </div>
            
            <div class="form-group">
                <label>Address</label><span class="required">*</span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                        <label>Photo</label><span class="required">*</span>
                        <input type="file" class="custom-file-input" name="picture">
                </div>
            </div>
            
            
            <div class="form-check">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label" name>By registering to this website, I agree to term and condition</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection