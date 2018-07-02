<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  @include('layouts.main._metadata')
  @include('layouts.main._style')
</head>

<body class=" sidebar_main_open sidebar_main_swipe app_theme_d">
  @include('layouts.main._header')
  @include('layouts.main._sidebar')
  @yield('content')

  @include('layouts.main._script')
</body>

</html>