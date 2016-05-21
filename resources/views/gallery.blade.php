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
      	  	<td>
              <a href="{{ $rooms[$i+$j]->image_path }}">
      	  	    <img src="{{ $rooms[$i+$j]->image_path }}" width="300" height="200" style="background-color:white"/>
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




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  function myFunction(clicked_id) {
    q = document.getElementById(clicked_id).src;
    document.getElementById('modal-image').src=q;
  }
  </script>
</div>
@endsection
