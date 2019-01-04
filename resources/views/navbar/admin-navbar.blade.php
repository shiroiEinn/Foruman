<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="pull-right small time">
            {{Date('Y-m-d H:i:s')}}
        </div>
    </div>
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      </div>
      <div class="navbar-header">
        <a class="small navbar-brand" href="{{route('myForum')}}">My Forum</a>
      </div>
      <div class="dropdown show navbar-header">
        <a class="btn btn-secondary dropdown-toggle custom-padding" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="icon-withtext">
              <div class="small navbar-brand">Master</div>
              <div class="small-checkicon"></div>
            </div>
        </a>
      
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{route('viewUserMaster')}}">User</a>
          <a class="dropdown-item" href="{{route('viewForumMaster')}}">Forum</a>
          <a class="dropdown-item" href="{{route('viewCategoryMaster')}}">Category</a>
        </div>
        
      </div>
      <div class="navbar-header">
        <a class="small navbar-brand" href="{{route('viewMessage')}}">Inbox</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
              <div class="navbar-brand imagenavbar">
                  <img class="circle" src="{{asset('images/'.Auth::user()->image_url)}}" alt="">
              </div>
            </li>
            <li>
              <div class="navbar-brand greeting">
                  <div class="verysmall">welcome,</div>
                  <a class="default-font-color" href="{{route('viewProfile')}}">{{Auth::user()->username}}</a>
              </div>
            </li>
            
            <li><div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="checkicon"></div>
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="{{route('viewProfile')}}">Profile</a>
                  <a class="dropdown-item" href="/login/doLogout">Logout</a>
                </div>
              </div>
            </li>
            <li>
            </li>
          </ul>
          
      </div><!--/.nav-collapse -->
    </div>
  </nav>