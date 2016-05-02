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
        <form method="POST" action="{{ url('/room') }}">
        {{ csrf_field() }}
          <button type="submit" class="btn btn-lg btn-default">Create New Room!</button>
        </form>
      @endif
	  </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Please Log In First!</h4>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
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
