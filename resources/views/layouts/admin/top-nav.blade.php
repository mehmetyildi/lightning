   <!-- top navigation -->
   <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
        

          @guest
          <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @else
          <li class="">
            <a class="user-profile dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown"  aria-expanded="false">
              {{ Auth::user()->name }} <span class="fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>
            </li> 
          </ul>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>




        </li>
        @endguest
      </ul>
    </li>
  </ul>
</nav>
</div>
</div>
<!-- /top navigation -->
