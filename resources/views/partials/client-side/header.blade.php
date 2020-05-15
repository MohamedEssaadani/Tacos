<header>
    <div class="container">
        <a class="logo" href="#"><img src="images/tacos-logo.png" alt="Logo"></a>

        @guest
        <div class="right-area">
            <h6 style="float:left;"><a class="plr-20 color-white btn-fill-primary" href="{{route('login')}}">Login</a>
            </h6>
            <h6 style="float:right;"><a class="plr-20 color-white btn-fill-primary" style="margin-left:10px;"
                    href="{{route('register')}}">Sign Up</a></h6>
        </div>
        <!-- right-area -->
        @else
        <div class="right-area">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </div>
        @endguest



        <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

        <ul class="main-menu font-mountainsre" id="main-menu">
            <li><a href="{{route('LandingPage')}}">HOME</a></li>
            <li><a href="">TACOS</a></li>
            <li><a href="">MENU</a></li>
            <li><a href="">ABOUT US</a></li>
            <li><a href="">CONTACT</a></li>
            <li><a href="">Cart <i class="fa fa-shopping-cart"></i></a></li>
        </ul>

        <div class="clearfix"></div>
    </div><!-- container -->
</header>