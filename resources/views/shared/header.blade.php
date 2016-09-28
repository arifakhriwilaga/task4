<!-- HEADER -->
<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <!-- <li><img src="img/example_logo.gif" width="150px" height="60px"></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- menu where user logged in -->
                @if($user = Sentinel::check())
                <li>{!! link_to('home', 'Home') !!}</li>                    
            @if($user = Sentinel::inRole('admin'))
                <li>{!! link_to('article-index', 'Article') !!}</li>
            @endif
                <li class="dropdown">
                  <a href="bootstrap-elements.html" data-target="dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">User
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="">Profile</a></li>
                    <li>{!! link_to('user/logout', 'Logout') !!}</li>
                  </ul>
                </li>
                @else
                    <li>{!! link_to('user/login', 'Login') !!}</li>
                    <li>{!! link_to('user/sign-up', 'Sign Up') !!}</li>
                @endif
            </ul> 
        </div>
<!-- END HEADER -->