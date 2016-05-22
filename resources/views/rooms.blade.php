@extends('layouts.app2')

@section('title')
    <title>We Draw! - Rooms</title>
@endsection
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@section('content')
<div class="content">
  <h3 id="page-title">ONLINE ROOMS</h3>
    <div class="new-room">
      @if (Auth::guest())
        <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModal">
          Create New Rooms!
        </button>
      @else
        <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#roomModal">
          Create New Rooms!
        </button>
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

    <!-- Modal -->
    <div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="{{ url('/room') }}">
            {{ csrf_field() }}
          <div class="modal-body">
            <h4>Title</h4>
            <input id="title" type="text" class="form-control" name="title" placeholder="input title here..">
          </div>

          <div class="modal-footer">
              <button type="submit" class="btn btn-lg btn-default">Create New Room!</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--END MODAL-->

    <div class="room">
    <div class="table-responsive">
    <table class="table">
      @for ($i = 0; $i < count($rooms); $i = $i+3)
      <tr>
        @for ($j = 0; $j < 3; $j++)
          @if ($i+$j < count($rooms))
            <td class="room-img">
              @if(Auth::guest())
                <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}" data-toggle="modal" data-target="#myModal">
                  <img id="imgroms" src="{{ $rooms[$i+$j]->image_path }}" data-toggle="tooltip" data-placement="right" title="Join Room!" width="300" height="200" style="background-color:white"/>
                </a>
              @else
                 <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}" data-toggle="tooltip" data-placement="right" title="Join Room!">
                  <img id="imgroms" src="{{ $rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
                </a>
              @endif
            </td>
          @endif
        @endfor
      </tr>

      <tr>
        @for ($j = 0; $j < 3; $j++)
          @if ($i+$j < count($rooms))
            <td class="title">
              <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}" data-toggle="tooltip" data-placement="right" title="Join Room!">
                {{ $rooms[$i+$j]->title }}
              </a>
            </td>
          @endif
        @endfor
      </tr>

      <tr class="owner">
        @for ($j = 0; $j < 3; $j++)
          @if ($i+$j < count($rooms))
            <td>{{ $rooms[$i+$j]->user->name }}</td>
          @endif
        @endfor
      </tr>
      @endfor
    </table>
    </div>
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


  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>


</div>

@endsection
