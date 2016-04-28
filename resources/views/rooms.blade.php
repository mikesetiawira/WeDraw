@extends('layouts.app2')

@section('title')
    <title>We Draw! - Rooms</title>
@endsection

@section('content')
<div class="content">
  <h3>ONLINE ROOMS</h3>
    <div class="new-room">
      @if (Auth::guest())
        <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModal">
          Create New Rooms!
        </button>
      @else
        <a class="btn btn-lg btn-default" type="button" href="{{ url('/canvas') }}">Create New Rooms!</a>
      @endif
	  </div>

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
    <!--END MODAL-->

    <div class="gallery">
    <table>
      <tr>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
      </tr>

      <tr>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
      </tr>

      <tr class="owner">
        <td>Image Owner</td>
        <td>Image Owner</td>
        <td>Image Owner</td>
      </tr>


      <tr>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
        <td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
      </tr>

      <tr>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
        <td class="title"><a href="#" data-toggle="tooltip" data-placement="right" title="Join Room!">Image Title</a></td>
      </tr>

      <tr class="owner">
        <td>Image Owner</td>
        <td>Image Owner</td>
        <td>Image Owner</td>
      </tr>
    </table>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

</div>

@endsection
