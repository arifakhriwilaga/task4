<!-- HEADER -->

<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li><img src="img/example_logo.gif" width="150px" height="60px"></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li> {!! link_to('index', 'Home') !!}</li>                    
                    <!-- menu where user logged in -->
                    @if($user = Sentinel::check())
                    <li><a href="">profile</a></li>
                    @if($user = Sentinel::inRole('admin'))
                    <li>{!! link_to('article-index', 'Article') !!}</li>
                    @endif
                    <li>
                    <!-- {{ Sentinel::getUser()->email }} -->
                    {!! link_to('user/logout', 'Logout') !!}</li>
                    @else
                    <li>{!! link_to('user/login', 'Login') !!}</li>
                    <li>{!! link_to('user/sign-up', 'Sign Up') !!}</li>
                    @endif
                    <!-- end menu -->
                </ul> 
            </div>
        </div>
    </div>
    <br>
    <!-- END HEADER