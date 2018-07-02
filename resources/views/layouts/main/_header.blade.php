<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
      <nav class="uk-navbar">

        <!-- main sidebar switch -->
        <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
          <span class="sSwitchIcon"></span>
        </a>
        <div class="uk-navbar-flip">
          <ul class="uk-navbar-nav user_actions">
            <li>
              <a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large">
                <i class="material-icons md-24 md-light">&#xE5D0;</i>
              </a>
            </li>
            <li>
              <a href="#" id="main_search_btn" class="user_action_icon">
                <i class="material-icons md-24 md-light">&#xE8B6;</i>
              </a>
            </li>
            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
              <a href="#" class="user_action_image">
                <img class="md-user-image" src="{{asset('altair/assets/img/avatars/avatar_11.png')}}" alt="" />
              </a>
              <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav js-uk-prevent">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="header_main_search_form">
      <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
      <form class="uk-form">
        <input type="text" class="header_main_search_input" />
        <button class="header_main_search_btn uk-button-link">
          <i class="md-icon material-icons">&#xE8B6;</i>
        </button>
      </form>
    </div>
  </header>
  <!-- main header end -->