@extends('layouts.app2')

@section('content')

<div class="content">
  <div class="profile">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="table-responsive">
          <form class="form-register" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}
          <table class="table">
            <tr>
              <td><h5>Username</h5></td>
              <td><h5>{{ Auth::user()->name }}</h5></td>
              
            </tr>

            <tr>
              <td><h5>Email</h5></td>
              <td><h5>{{ Auth::user()->email }}</h5></td>
              
            </tr>

            <tr>
              <td><h5>Password</h5></td>
              <td></td>
              
            </tr>

          </table>
        </form>

        </div>
      </div>

      <div class="col-md-3">
        <a class="btn btn-default" type="button" href="{{ url('/logout') }}">Logout</a>
      </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
          
            <div class="modal-body">
              <form class="form-register">
                <label>Username: {{ $user->nme }}</label>
                <br>
                <input type="text" class="form-control" placeholder="New Username">

                <label>Email: {{ $user->email }}</label>
                <br>
                <input type="email" class="form-control" placeholder="New Email">

                <label>Password</label>
                <input type="password" class="form-control" placeholder="Current Password">
                <input type="password" class="form-control" placeholder="New Password">
                <input type="password" class="form-control" placeholder="Confirm Password">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!--END MODAL-->
    <h3 id="page-title">{{ Auth::user()->name }} Gallery</h3>

    <div class="gallery">
      <div class="table-responsive">
        <table class="table">
          @for ($i = 0; $i < count($rooms); $i = $i+3)
          <tr>
            @for ($j = 0; $j < 3; $j++)
              @if ($i+$j < count($rooms))
                <td>
                @if ($rooms[$i+$j]->status == 'completed')
                  <a href="{{ '../'.$rooms[$i+$j]->image_path }}">
                    <img src="{{ '../'.$rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
                  </a>
                @else
                  <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}">
                    <img src="{{ '../'.$rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
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
                  <a href="{{ $rooms[$i+$j]->image_path }}">
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

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Image Title</h4>
            </div>
          
            <div class="modal-body">
              <img src="" id="modal-image">
            </div>
          </div>
        </div>
      </div>
      <!--END MODAL-->
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  function myFunction(clicked_id) {
    q = document.getElementById(clicked_id).src;
    document.getElementById('modal-image').src=q;
  }
  </script>
</div>
@endsection