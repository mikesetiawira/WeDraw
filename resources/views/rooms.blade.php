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

    <div class="gallery">
    <table>
      <canvas id="paint" width="800" height="480" style="border:1px solid #787272;" hidden></canvas>
      @for ($i = 0; $i < count($rooms); $i = $i+3)
      <tr>
          @for ($j = 0; $j < 3; $j++)
          @if ($i+$j < count($rooms))
          <td>
          
      
          <script>
           
            canvas = document.getElementById('paint')
            context = canvas.getContext("2d");

            var id = '{{ $rooms[$i+$j]->id }}';

            var clickX = new Array();
            var clickY = new Array();
            var clickDrag = new Array();
            var shape = new Array();
            var clickColor = new Array();
            var clickSize = new Array();
            function loadCanvas() {
            $.ajax({
              url: 'room/' + id + '/load',
              type: 'get',
              async: false,
              success: function(data) {
                var obj = JSON.parse(data);
                clickX = obj.x;
                clickY = obj.y;
                clickDrag = obj.drag;
                shape = obj.shape;
                clickColor = obj.color;
                clickSize = obj.size;
              }
            });
          }

          loadCanvas();
          context.clearRect(0, 0, context.canvas.width, context.canvas.height); 
           for(var i=0; i < clickX.length; i++) {    
             context.beginPath();

              if(clickDrag[i] && i){
                  context.moveTo(clickX[i-1], clickY[i-1]);
               }else{
                  context.moveTo(clickX[i], clickY[i]);
              }
             
            if(shape[i] == "rectangle") {
              var x = Math.min(clickX[i-1], clickX[i]);
              var y = Math.min(clickY[i-1], clickY[i]);
              var width = Math.abs(clickX[i-1] - clickX[i]);
              var height = Math.abs(clickY[i-1] - clickY[i]);
              context.strokeStyle = clickColor[i];
              context.lineWidth = clickSize[i];
              context.strokeRect(x, y, width, height);
            }
            
            else if(shape[i] == "ellipse") {

              if(clickDrag[i]==true) {
              var x = Math.min(clickX[i-1], clickX[i]);
              var y = Math.min(clickY[i-1], clickY[i]);
              
              var w = Math.abs(clickX[i-1] - clickX[i]);
              var h = Math.abs(clickY[i-1] - clickY[i]);
              
              var kappa = .5522848,
              ox = (w / 2) * kappa, // control point offset horizontal
              oy = (h / 2) * kappa, // control point offset vertical
              xe = x + w,           // x-end
              ye = y + h,           // y-end
              xm = x + w / 2,       // x-middle
              ym = y + h / 2;       // y-middle
              
              context.beginPath();
              context.moveTo(x, ym);
              context.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
              context.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
              context.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
              context.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
              context.closePath();
              context.strokeStyle = clickColor[i];
              context.lineWidth = clickSize[i];
              context.stroke();
              }
            }
            else if(shape[i] == "marker" || shape[i] == "line") {
              context.lineTo(clickX[i], clickY[i]);
              context.closePath();
              context.strokeStyle = clickColor[i];
              context.lineWidth = clickSize[i];
              context.stroke();
              }
            }
          

  
            var img    = canvas.toDataURL("image/png");
            document.write('<img src="'+img+'" width="300" height="200"/>');
          </script>
          </td>
          @endif
          @endfor
      </tr>

      <tr>

        @for ($j = 0; $j < 3; $j++)
        @if ($i+$j < count($rooms))
        <td class="title"><a href="{{ url('/room/'.$rooms[$i+$j]->id) }}" data-toggle="tooltip" data-placement="right" title="Join Room!">{{ $rooms[$i+$j]->title }}</a></td>
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



  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>


</div>

@endsection
