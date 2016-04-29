@extends('layouts.app2')

@section('title')
    <title>We Draw!</title>
@endsection

@section('content')
<div class="content">
    <h3>POPULAR THIS WEEK</h3>
  
    <div id="mySlider" class="slider slide" data-ride="slider">
      <ol class="slider-indicators">
        <li data-target="#mySlider" data-slide-to="0" class="active"></li>
        <li data-target="#mySlider" data-slide-to="1"></li>
        <li data-target="#mySlider" data-slide-to="2"></li>
      </ol>
      
      <div class="slider-inner" role="listbox">
        <div class="item active">
          
        </div>
        <div class="item">
         
        </div>
        <div class="item">
      
        </div>
      </div>

      <a class="left slider-control" href="#mySlider" role="button" data-slide="prev">
        <img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-prev.png">
      </a>
      <a class="right slider-control" href="#mySlider" role="button" data-slide="next">
        <img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-next.png">
      </a>
    </div>
 

    @if (Auth::guest())
      <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModal">
      Draw Now!
      </button>
    @else
      <a class="btn btn-lg btn-default" type="button" href="{{ url('/canvas') }}">Draw Now!</a>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Please Log in first</h4>
          </div>
          <div class="modal-body">
            <form class="form-register" method="POST" action="{{ url('/login') }}">
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

              <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>



<form class="form-register" method="POST" action="{{ url('/room') }}">
  {{ csrf_field() }}
  <button type="submit">Submit</button>
</form>
@endsection