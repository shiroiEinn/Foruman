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
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
          </ul>
          
      </div><!--/.nav-collapse -->
    </div>
  </nav>