<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Indomoe Admin :: Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    
    
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/cool-login/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style>
        .cont
        {
          background-image: url("{{ URL::asset('assets/img/login-header.jpg') }}");
        }
    </style>    
    
  </head>

  <body>

    <div class="cont">
      <div class="demo">
        <div class="login">
          <div class="login-icon">
              <img src="{{ URL::asset('assets/img/logo.png') }}" alt="">
          </div>
          <div class="login__form">
          <form class="form-horizontal" id="login-me" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="login__row">
              <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
              </svg>
              <input type="email" class="login__input name" name="email" placeholder="Email"/>
            </div>
            <div class="login__row">
              <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
              </svg>
              <input type="password" class="login__input pass" name="password" placeholder="Password"/>
            </div>
            <div class="login__row">
                <label style="color:#FDFCFD;font-size:20px;font-family: 'Roboto',sans-serif;">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            
            <button type="submit" class="login__submit">Sign in</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cool-login/js/index.js"></script>

    
    
    
  </body>
</html>
