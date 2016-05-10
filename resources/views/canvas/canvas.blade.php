@extends('layouts.app2')

@section('title')
    <title>Canvas!</title>
@endsection

@section('content')
<div class="content">
  {{-- Form::hidden('id', $room->id, ['id' => 'invisible_id']) --}}
  {{-- Form::hidden('canvas', $room->canvas, ['id' => 'invisible_canvas']) --}}
  <meta name="room_id" content="{{ $room->id }}" />
  <meta name="room_canvas" content="{{ $room->canvas }}" />
  <meta name="_token" content="{{ csrf_token() }}" />
  <input id="invisible_id" name="id" type="hidden" value="{{ $room->id }}">
  <input id="invisible_canvas" name="canvas" type="hidden" value="{{ $room->canvas }}">
  <img id="crayons" src="crayontexture.png" hidden> 

  <h3>{{ $room->title }}</h3>
  <h4>{{ $owner->name }}</h4>
  
  <p>Canvas size :  <input id="width" value="800"> x <input id="height" value="480"> px</p>
    
  <div class="sketch" oncontextmenu="return false">
    <canvas id="paint" width="800" height="480" style="border:1px solid #787272;"></canvas>
  </div>

  <div class="drawing-tools">
    <div class="table-responsive">
    <table class="table">
    <tr>
      <td>Color :  </td>
      <td class="val"><input id="color" class="jscolor" value="ab2567"></td>
      
      <td>Environment :  </td>
      <td class="val">
        <button id="AA" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Clean"><img src="{{ URL::asset('image/clean.png') }}"></button> 
        <button id="BB" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Crayon"><img src="{{ URL::asset('image/crayon.png') }}"></button>
      </td>

      <td><button id="clear" class="btn-clear"  data-toggle="tooltip" data-placement="bottom" title="Clear"><img src="{{ URL::asset('image/clear.png') }}"></button></td>
    </tr>
    <tr>
      <td>Size :  </td>
      <td class="val"><input id="size" value="10"></td>

      <td>Tools :  </td>
      <td class="val">
        <button id="A" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Eraser"><img src="{{ URL::asset('image/eraser.png') }}"></button> 
        <button id="B" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Marker"><img src="{{ URL::asset('image/marker.png') }}"></button>
      </td>
    </tr>
    <tr>
      <td></td>
      <td class="val">
        <button id="a" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Normal" id="normal"><img src="{{ URL::asset('image/font.png') }}"></button>
        <button id="b" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Large" id="large"><img src="{{ URL::asset('image/font.png') }}"></button>
        <button id="c" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Huge" id="huge"><img src="{{ URL::asset('image/font.png') }}"></button>
      </td>

      <td>Shapes :  </td>
      <td class="val">
        <button id="M" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Line"><img src="{{ URL::asset('image/line.png') }}"></button>
        <button id="O" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Square"><img src="{{ URL::asset('image/square.png') }}"></button>
        <button id="N" class="btn-tools" data-toggle="tooltip" data-placement="bottom" title="Ellipse"><img src="{{ URL::asset('image/round.png') }}"></button>
      </td>
    </tr>
    </table>
  </div>
  </div>
  
  <script src="{{ URL::asset('js/jquery-1.12.2.min.js') }}"></script>
  <script src ="{{ URL::asset('js/canvas.js') }}"> </script>
  <script src="{{ URL::asset('js/jscolor.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });
  </script>
@endsection
