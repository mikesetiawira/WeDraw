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
              <td><h4>Username</h4></td>
              <td><h4>{{ Auth::user()->name }}</h4></td>
              
            </tr>

            <tr>
              <td><h4>Email</h4></td>
              <td><h4>{{ Auth::user()->email }}</h4></td>
              
            </tr>

            <tr>
              <td><h4>Password</h4></td>
              <td><h4>**********</h4></td>
              
            </tr>

          </table>
        </form>

        </div>
      </div>

      <div class="col-md-3">
        <a class="btn btn-default" type="button" href="{{ url('/logout') }}">Logout</a>
      </div>
    </div>

    <h3 id="page-title">{{ Auth::user()->name }} Gallery</h3>

    <div class="gallery">
      <div class="table-responsive">
        <table class="table">
          @for ($i = 0; $i < count($rooms); $i = $i+3)
          <tr>
            @for ($j = 0; $j < 3; $j++)
              @if ($i+$j < count($rooms))
                <td class="image">
                @if ($rooms[$i+$j]->status == 'completed')
                  <a href="{{ '../'.$rooms[$i+$j]->image_path }}">
                    <img id="imgroms" src="{{ '../'.$rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
                  </a>
                @else
                  <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}">
                    <img id="imgroms" src="{{ '../'.$rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
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
                  @if ($rooms[$i+$j]->status == 'completed')
                    <a href="{{ $rooms[$i+$j]->image_path }}">
                      {{ $rooms[$i+$j]->title }}
                    </a>
                  @else
                    <a href="{{ url('/room/'.$rooms[$i+$j]->id) }}" data-toggle="tooltip" data-placement="right" title="Join Room!">
                      {{ $rooms[$i+$j]->title }}
                    </a>
                  @endif

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
  </div>

  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

</div>
@endsection