<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      </div>
      <div class="navbar-header">
        <a class="small navbar-brand" href="{{route('myForum')}}">My Forum</a>
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
                  <a class="default-font-color" href="#">{{Auth::user()->username}}</a>
              </div>
            </li>
            <li><div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="checkicon"></div>
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Profile</a>
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