
  <!-- main sidebar -->
  <aside id="sidebar_main">
      <div class="sidebar_main_header">
        <div class="sidebar_logo">
          <a href="{{url('/')}}" class="sSidebar_hide">
            <img src="{{asset('altair/assets/img/logo_main.png')}}" alt="" height="15" width="71" />
          </a>
          <a href="{{url('/')}}" class="sSidebar_show">
            <img src="{{asset('altair/assets/img/logo_main_small.png')}}" alt="" height="32" width="32" />
          </a>
        </div>
        <div class="sidebar_actions">
          <h3>Admin Dashboard</h3>
        </div>
      </div>
      <div class="menu_section">
        <ul>
          <li title="Pegawai" data-uk-tooltip="{pos:'right'}">
            <a href="{{route('dashboard')}}">
              <span class="menu_icon">
                <i class="material-icons">recent_actors</i>
              </span>
              <span class="menu_title">Pegawai</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="menu_icon">
                <i class="material-icons">fingerprint</i>
              </span>
              <span class="menu_title">Absen</span>
            </a>
            <ul>
              <li>
                <a href="{{route('absens')}}">List Hari Ini</a>
              </li>
              <li>
                <a href="{{route('get-absen-records')}}">Records</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
    <!-- main sidebar end -->
  