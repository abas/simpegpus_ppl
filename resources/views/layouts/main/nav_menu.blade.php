 {{-- nav menu --}}
<nav class="uk-background-default" uk-navbar>
  <div class="uk-navbar-left">
    <ul class="uk-navbar-nav">
      {{--
      <button class="md-btn">Bottom</button> --}}
      <li>
        <a href="{{route('get-absen-index')}}" data-uk-tooltip title="Absen Pegawai">Absen</a>
      </li>
      <li>
        <a href="{{route('get-mutasi-index')}}" data-uk-tooltip title="Mutasi Pegawai">Mutasi</a>
      </li>
    </ul>
  </div>
  <div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
      @guest
      <li>
        <a href="{{route('login')}}" data-uk-tooltip title="Login">Login Admin</a>
      </li>
      @else
      <li>
        <a href="#">{{Auth::user()->name}}</a>
        <div uk-dropdown>
          <ul class="uk-nav uk-dropdown-nav">
            <li>
              <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
              <a href="{{route('logout')}}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </ul>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</nav>
{{-- end nav menu --}}