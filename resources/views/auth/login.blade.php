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

  <title>SimPegPus | Gladiator Doscom</title>

  {{-- <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'> --}}

  <!-- uikit -->
  <link rel="stylesheet" href="{{asset('altair/bower_components/uikit/css/uikit.almost-flat.min.css')}}" />

  <!-- altair admin login page -->
  <link rel="stylesheet" href="{{asset('altair/assets/css/login_page.min.css')}}" />

</head>

<body class="login_page">

  <div class="login_page_wrapper">
    <div class="md-card" id="login_card">
      <div class="md-card-content large-padding" id="login_form">
        <div class="login_heading">
          <div class="user_avatar"></div>
        </div>
        {{-- form login --}}
        <form action="{{route('login')}}" method="POST">
          {{ csrf_field() }}
          {{-- <div class="uk-form-row">
            <div class="uk-input">
              {{$errors}}
            </div>
          </div> --}}
          <div class="uk-form-row">
            <label for="login_username">Email</label>
            <input 
              class="
                md-input 
                {{$errors->has('email') ? ' md-input-danger' : ''}}
                "
              type="text" 
              id="login_username" 
              name="email" />
          </div>
          <div class="uk-form-row">
            <label for="login_password">Password</label>
            <input 
              class="
                md-input
                {{$errors->has('password') ? ' md-input-danger' : ''}}
                "
              type="password" 
              id="login_password" 
              name="password" />
          </div>
          <div class="uk-margin-medium-top">
            <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
          </div>
          <div class="uk-margin-top">
            <span class="icheck-inline">
              <input type="checkbox" name="remember" id="login_page_stay_signed" data-md-icheck />
              <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
            </span>
            <a class="uk-float-right" href="{{route('register')}}">Create an account</a>
          </div>
        </form>
      </div>
    </div>
    
  </div>

  <!-- common functions -->
  <script src="{{asset('altair/assets/js/common.min.js')}}"></script>
  <!-- altair core functions -->
  <script src="{{asset('altair/assets/js/altair_admin_common.min.js')}}"></script>

  <!-- altair login page functions -->
  <script src="{{asset('altair/assets/js/pages/login.min.js')}}"></script>
</body>

</html>