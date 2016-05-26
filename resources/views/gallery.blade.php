@extends('layouts.app2')

@section('title')
    <title>We Draw! - Gallery</title>
@endsection

@section('content')
<div class="content">
  <h3 id="page-title">GALLERY</h3>

  <div class="gallery">
    <div class="table-responsive">
  	<table class="table">
      @for ($i = 0; $i < count($rooms); $i = $i+3)
  	  <tr>
        @for ($j = 0; $j < 3; $j++)
          @if ($i+$j < count($rooms))
      	  	<td class="image">
              <a href="{{ $rooms[$i+$j]->image_path }}">
      	  	    <img id="imgroms" src="{{ $rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
      	  	  </a>
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
  </div>
</div>
@endsection
