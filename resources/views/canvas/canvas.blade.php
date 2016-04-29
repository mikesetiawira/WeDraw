@extends('layouts.app2')

@section('title')
    <title>Canvas!</title>
@endsection

@section('content')
<div class="content">
  {{-- Form::hidden('id', $room->id, ['id' => 'invisible_id']) --}}
  {{-- Form::hidden('canvas', $room->canvas, ['id' => 'invisible_canvas']) --}}
  <input id="invisible_id" name="id" type="hidden" value="{{ $room->id }}">
  <input id="invisible_canvas" name="canvas" type="hidden" value="{{ $room->canvas }}">
  <img id="crayons" src="crayontexture.png" hidden> 

  <h3>Image Title</h3>
  <h4>Image Owner</h4>
  
  <p>Canvas size :  <input id="width" value="800"> x <input id="height" value="480"> px</p>
    
  <div class="sketch" oncontextmenu="return false">
    <canvas id="paint" width="800" height="480" style="border:1px solid #787272;"></canvas>
  </div>

  <div class="drawing-tools">
    <table>
    <tr>
      <td>Color :  </td>
      <td class="val"><input id="color" class="jscolor" value="ab2567"></td>
      
      <td>Environment :  </td>
      <td class="val">
        <button id="AA" class="btn-tools"><img src="{{ URL::asset('image/clean.png') }}" title="Clean"></button> 
        <button id="BB" class="btn-tools"><img src="{{ URL::asset('image/crayon.png') }}" title="Crayon"></button>
      </td>

      <td><button id="clear" class="btn-clear"><img src="{{ URL::asset('image/clear.png') }}" title="Clear"></button></td>
    </tr>
    <tr>
      <td>Size :  </td>
      <td class="val"><input id="size" value="10"></td>

      <td>Tools :  </td>
      <td class="val">
        <button id="A" class="btn-tools"><img src="{{ URL::asset('image/eraser.png') }}" title="Eraser"></button> 
        <button id="B" class="btn-tools"><img src="{{ URL::asset('image/marker.png') }}" title="Marker"></button>
      </td>
    </tr>
    <tr>
      <td></td>
      <td class="val">
        <button id="a" class="btn-tools"><img src="{{ URL::asset('image/font.png') }}" title="Normal" id="normal"></button>
        <button id="b" class="btn-tools"><img src="{{ URL::asset('image/font.png') }}" title="Large" id="large"></button>
        <button id="c" class="btn-tools"><img src="{{ URL::asset('image/font.png') }}" title="Huge" id="huge"></button>
      </td>

      <td>Shapes :  </td>
      <td class="val">
        <button id="M" class="btn-tools"><img src="{{ URL::asset('image/line.png') }}" title="Line"></button>
        <button id="O" class="btn-tools"><img src="{{ URL::asset('image/square.png') }}" title="Square"></button>
        <button id="N" class="btn-tools"><img src="{{ URL::asset('image/round.png') }}" title="Ellipse"></button>
      </td>
    </tr>

  </table>

 


  <script src="{{ URL::asset('js/jquery-1.12.2.min.js') }}"></script>
  <script src ="{{ URL::asset('js/canvas.js') }}"> </script>
  <script src="{{ URL::asset('js/jscolor.js') }}"></script>

    </table>
  </div>

  <script src="js/jquery-1.12.2.min.js"></script>
  <script src ="js/canvas.js"> </script>
  <script src="js/jscolor.js"></script>

</div>
@endsection
