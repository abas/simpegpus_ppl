<!-- common functions -->
<script src="{{asset('altair/assets/js/common.min.js')}}"></script>
<!-- uikit functions -->
<script src="{{asset('altair/assets/js/uikit_custom.min.js')}}"></script>
<!-- altair common functions/helpers -->
<script src="{{asset('altair/assets/js/altair_admin_common.min.js')}}"></script>

<!-- page specific plugins -->
<!-- peity (small charts) -->
<script src="{{asset('altair/bower_components/peity/jquery.peity.min.js')}}"></script>
<!-- easy-pie-chart (circular statistics) -->
<script src="{{asset('altair/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<!-- CLNDR -->
<script src="{{asset('altair/bower_components/clndr/src/clndr.js')}}"></script>
<!-- fitvids -->
<script src="{{asset('altair/bower_components/fitvids/jquery.fitvids.js')}}"></script>

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
{{-- end script --}}
@yield('_addscript')