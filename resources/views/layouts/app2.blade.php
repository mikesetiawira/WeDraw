<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    @yield('title')

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>

  <body>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ url('/home') }}"><h2>WE DRAW!</h2></a>
        </div>

        @if (Request::url() !== url('/register'))
        @if (Auth::guest())
          <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" method="POST" action="{{ url('/login') }}">
               {!! csrf_field() !!}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @elseif ($errors->has('password'))  
                  <span class="help-error"></span>
                @endif
                <input type="email" placeholder="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @elseif ($errors->has('email'))  
                  <span class="help-error"></span>
                @endif
                <input type="password" placeholder="password" class="form-control" name="password">
              </div>

              <p>don't have any account? click here to <a href="{{ url('/register') }}">register</a></p>
              <div class="login-button">
                <button type="submit" class="btn btn-default">Log in</button>
              </div>
            </form>
          </div><!--/.navbar-collapse -->

        @else
          <div class="user">
            <h3>Hi, {{ Auth::user()->name }}!</h3>
            <a class="btn btn-default" type="button" href="{{ url('/logout') }}">Logout</a>
          </div>
        @endif

        @else
          <div id="navbar" class="navbar-collapse collapse">
          </div>
          <div class="user">
          </div>
        @endif

        <nav>
          <ul class="nav nav-justified">
            <li><a href="{{ url('/home') }}">HOME</a></li>
            <li><a href="{{ url('/gallery') }}">GALLERY</a></li>
            <li><a href="{{ url('/rooms') }}">ROOMS</a></li>
            <li><a href="{{ url('/faq') }}">FAQ</a></li>
          </ul>
        </nav>
      
        @yield('content')
      
        <footer class="footer">
          <p>&copy; PPL B02.</p>
        </footer>
      </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.launch-modal').on('click', function(e){
    e.preventDefault();
    $( '#' + $(this).data('modal-id') ).modal();
  });
    
    /*
        Form validation
    */
  $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
      $(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
      
      $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
        if( $(this).val() == "" ) {
          e.preventDefault();
          $(this).addClass('input-error');
        }
        else {
          $(this).removeClass('input-error');
        }
      });
      
    });
    </script>
  </body>
</html>
