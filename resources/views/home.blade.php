<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Remove Tap Highlight on Windows Phone IE -->
  <meta name="msapplication-tap-highlight" content="no" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/png" href="{{asset('altair/assets/img/favicon-16x16.png')}}" sizes="16x16">
  <link rel="icon" type="image/png" href="{{asset('altair/assets/img/favicon-32x32.png')}}" sizes="32x32">

  <title>Altair Admin v2.2.0</title>

  <!-- additional styles for plugins -->
  <!-- weather icons -->
  <link rel="stylesheet" href="{{asset('altair/bower_components/weather-icons/css/weather-icons.min.css')}}" media="all">
  <!-- metrics graphics (charts) -->
  <link rel="stylesheet" href="{{asset('altair/bower_components/metrics-graphics/dist/metricsgraphics.css')}}">
  <!-- chartist -->
  <link rel="stylesheet" href="{{asset('altair/bower_components/chartist/dist/chartist.min.css')}}">

  <!-- uikit -->
  <link rel="stylesheet" href="{{asset('altair/bower_components/uikit/css/uikit.almost-flat.min.css')}}" media="all">

  <!-- flag icons -->
  <link rel="stylesheet" href="{{asset('altair/assets/icons/flags/flags.min.css')}}" media="all">

  <!-- altair admin -->
  <link rel="stylesheet" href="{{asset('altair/assets/css/main.min.css')}}" media="all">

  <!-- matchMedia polyfill for testing media queries in JS -->
  <!--[if lte IE 9]>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
  <![endif]-->

</head>

<body class=" sidebar_main_open sidebar_main_swipe app_theme_d">
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
                    <a href="#">My profile</a>
                  </li>
                  <li>
                    <a href="#">Settings</a>
                  </li>
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
        <li class="current_section" title="Dashboard">
          <a href="#">
            <span class="menu_icon">
              <i class="material-icons">&#xE871;</i>
            </span>
            <span class="menu_title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="menu_icon">
              <i class="material-icons">&#xE8D2;</i>
            </span>
            <span class="menu_title">Forms</span>
          </a>
          <ul>
            <li>
              <a href="#">Regular Elements</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
  <!-- main sidebar end -->

  <div id="page_content">
    <div id="page_content_inner">
      <!-- statistics (small charts) -->
      <div>
        <h3>Data Pegawai Terbaru</h3>
      </div>
      <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show"
        data-uk-sortable data-uk-grid-margin>
        @php $i=1; $colors = ['pink','teal','red','cyan','orange']; @endphp @foreach($newPegawais as $np)
        <div>
          <div class="md-card md-card-hover">
            <div class="md-card-head md-bg-{{$colors[$i-1]}}-500">
              <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                <i class="md-icon material-icons md-icon-light"></i>
                <div class="uk-dropdown uk-dropdown-small">
                  <ul class="uk-nav">
                    <li>
                      <a href="#">Edit</a>
                    </li>
                    <li>
                      <a href="#">Remove</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="uk-text-center">
                <img class="md-card-head-avatar" src="{{asset('altair/assets/img/avatars/avatar_0'.$i.'.png')}}" alt="">
              </div>
              <h3 class="md-card-head-text uk-text-center md-color-white">
                {{$np->nama}}
                <span class="uk-text-truncate">
                  {{$np->status_pegawai == 2 ? 'active' : ''}} {{$np->status_pegawai == 1 ? 'waiting' : ''}} {{$np->status_pegawai == 0 ? 'inactive'
                  : ''}}
                </span>
              </h3>
            </div>
            <div class="md-card-content">
              <ul class="md-list">
                <li>
                  <div class="md-list-content">
                    <span class="md-list-heading">ID : {{$np->id}}</span>
                    {{--
                    <span class="uk-text-small uk-text-muted"></span> --}}
                  </div>
                </li>
                <li>
                  <div class="md-list-content">
                    <span class="md-list-heading">No KTP</span>
                    <span class="uk-text-small uk-text-muted uk-text-truncate">{{$np->no_ktp}}</span>
                  </div>
                </li>
                <li>
                  <div class="md-list-content">
                    <span class="md-list-heading">Gaji</span>
                    <span class="uk-text-small uk-text-muted">{{($np->gaji)}}</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @php $i++;@endphp @endforeach
      </div>

      <!-- large chart -->
      <div class="uk-grid">
        <div class="uk-width-1-1">
          <div class="md-card">
            <div class="md-card-toolbar">
              <div class="md-card-toolbar-actions">
                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                <i class="md-icon material-icons">&#xE5D5;</i>
                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                  <i class="md-icon material-icons">&#xE5D4;</i>
                  <div class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-nav">
                      <li>
                        <a href="#">Action 1</a>
                      </li>
                      <li>
                        <a href="#">Action 2</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <h3 class="md-card-toolbar-heading-text">
                Pegawai
              </h3>
            </div>
            <div class="md-card-content">

              <div class="mGraph-wrapper">
                <table class="uk-table uk-table-nowrap">
                  <thead>
                    <tr>
                      <th class="uk-width-1-10">ID</th>
                      <th>No KTP</th>
                      <th>Gaji</th>
                      <th>Status Pegawai</th>
                      <th>Terdaftar</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pegawais as $p)
                    <tr>
                      <td>{{$p->id}}</td>
                      <td>{{$p->no_ktp}}</td>
                      <td>{{$p->gaji}}</td>
                      <td>{{$p->status_pegawai}}</td>
                      {{--
                      <span class="uk-badge uk-badge-danger">{status_pegawai}</span> --}}
                      <td>{{$p->created_at}}</td>
                      <td class="uk-text-center">
                        <a href="#">
                          <i class="md-icon material-icons"></i>
                        </a>
                        <a href="#">
                          <i class="md-icon material-icons"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$pegawais->links('pagination.uk')}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- common functions -->
  <script src="{{asset('altair/assets/js/common.min.js')}}"></script>
  <!-- uikit functions -->
  <script src="{{asset('altair/assets/js/uikit_custom.min.js')}}"></script>
  <!-- altair common functions/helpers -->
  <script src="{{asset('altair/assets/js/altair_admin_common.min.js')}}"></script>

  <!-- page specific plugins -->
  <!-- d3 -->
  <script src="{{asset('altair/bower_components/d3/d3.min.js')}}"></script>
  <!-- metrics graphics (charts) -->
  <script src="{{asset('altair/bower_components/metrics-graphics/dist/metricsgraphics.min.js')}}"></script>
  <!-- chartist (charts) -->
  <script src="{{asset('altair/bower_components/chartist/dist/chartist.min.js')}}"></script>
  <!-- maplace (google maps) -->
  {{--
  <script src="{{asset('altair/http://maps.google.com/maps/api/js?sensor=true"></script> --}}
  <script src="{{asset('altair/bower_components/maplace-js/dist/maplace.min.js')}}"></script>
  <!-- peity (small charts) -->
  <script src="{{asset('altair/bower_components/peity/jquery.peity.min.js')}}"></script>
  <!-- easy-pie-chart (circular statistics) -->
  <script src="{{asset('altair/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
  <!-- countUp -->
  <script src="{{asset('altair/bower_components/countUp.js/countUp.min.js')}}"></script>
  <!-- handlebars.js -->
  <script src="{{asset('altair/bower_components/handlebars/handlebars.min.js')}}"></script>
  <script src="{{asset('altair/assets/js/custom/handlebars_helpers.min.js')}}"></script>
  <!-- CLNDR -->
  <script src="{{asset('altair/bower_components/clndr/src/clndr.js')}}"></script>
  <!-- fitvids -->
  <script src="{{asset('altair/bower_components/fitvids/jquery.fitvids.js')}}"></script>

  <!--  dashbord functions -->
  <script src="{{asset('altair/assets/js/pages/dashboard.min.js')}}"></script>

  <script>
    $(function () {
      // enable hires images
      altair_helpers.retina_images();
      // fastClick (touch devices)
      if (Modernizr.touch) {
        FastClick.attach(document.body);
      }
    });
  </script>

  <script>
    (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-65191727-1', 'auto');
    ga('send', 'pageview');
  </script>
  <script>
    $(function () {
      var $switcher = $('#style_switcher'),
        $switcher_toggle = $('#style_switcher_toggle'),
        $theme_switcher = $('#theme_switcher'),
        $mini_sidebar_toggle = $('#style_sidebar_mini'),
        $boxed_layout_toggle = $('#style_layout_boxed'),
        $accordion_mode_toggle = $('#accordion_mode_main_menu'),
        $body = $('body');


      $switcher_toggle.click(function (e) {
        e.preventDefault();
        $switcher.toggleClass('switcher_active');
      });

      $theme_switcher.children('li').click(function (e) {
        e.preventDefault();
        var $this = $(this),
          this_theme = $this.attr('data-app-theme');

        $theme_switcher.children('li').removeClass('active_theme');
        $(this).addClass('active_theme');
        $body
          .removeClass(
            'app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i'
          )
          .addClass(this_theme);

        if (this_theme == '') {
          localStorage.removeItem('altair_theme');
        } else {
          localStorage.setItem("altair_theme", this_theme);
        }

      });

      // hide style switcher
      $document.on('click keyup', function (e) {
        if ($switcher.hasClass('switcher_active')) {
          if (
            (!$(e.target).closest($switcher).length) ||
            (e.keyCode == 27)
          ) {
            $switcher.removeClass('switcher_active');
          }
        }
      });

      // get theme from local storage
      if (localStorage.getItem("altair_theme") !== null) {
        $theme_switcher.children('li[data-app-theme=' + localStorage.getItem("altair_theme") + ']').click();
      }


      // toggle mini sidebar

      // change input's state to checked if mini sidebar is active
      if ((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") ==
          '1') || $body.hasClass('sidebar_mini')) {
        $mini_sidebar_toggle.iCheck('check');
      }

      $mini_sidebar_toggle
        .on('ifChecked', function (event) {
          $switcher.removeClass('switcher_active');
          localStorage.setItem("altair_sidebar_mini", '1');
          location.reload(true);
        })
        .on('ifUnchecked', function (event) {
          $switcher.removeClass('switcher_active');
          localStorage.removeItem('altair_sidebar_mini');
          location.reload(true);
        });


      // toggle boxed layout

      if ((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') ||
        $body.hasClass('boxed_layout')) {
        $boxed_layout_toggle.iCheck('check');
        $body.addClass('boxed_layout');
        $(window).resize();
      }

      $boxed_layout_toggle
        .on('ifChecked', function (event) {
          $switcher.removeClass('switcher_active');
          localStorage.setItem("altair_layout", 'boxed');
          location.reload(true);
        })
        .on('ifUnchecked', function (event) {
          $switcher.removeClass('switcher_active');
          localStorage.removeItem('altair_layout');
          location.reload(true);
        });

      // main menu accordion mode
      if ($sidebar_main.hasClass('accordion_mode')) {
        $accordion_mode_toggle.iCheck('check');
      }

      $accordion_mode_toggle
        .on('ifChecked', function () {
          $sidebar_main.addClass('accordion_mode');
        })
        .on('ifUnchecked', function () {
          $sidebar_main.removeClass('accordion_mode');
        });


    });
  </script>
</body>

</html>