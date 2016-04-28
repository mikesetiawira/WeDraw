@extends('layouts.app2')

@section('title')
    <title>Canvas!</title>
@endsection

@section('content')
<div class="content">
  <img id="crayons" src="crayontexture.png" hidden> 
  <div class="col-md-6 col-md-offset-3"> 
  <table>
    <tr>
      <td>Canvas size :  </td>
      <td><input id="width" value="800"> x <input id="height" value="480"> px</td>
    </tr>
    <tr>
      <td>Color :  </td>
      <td><input id="color" class="jscolor" value="ab2567"></td>
    </tr>
    <tr>
      <td>Size :  </td>
      <td><input id="size" value="10"></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button id="a" class="btn-tools">Normal</button> 
        <button id="b" class="btn-tools">Large</button> 
        <button id="c" class="btn-tools">Huge</button>
      </td>
    </tr>
    <tr>
      <td>Environment :  </td>
      <td>
        <button id="AA" class="btn-tools">Clean</button> 
        <button id="BB" class="btn-tools">Crayon</button>
      </td>
    </tr>
    <tr>
      <td>Tools :  </td>
      <td>
        <button id="A" class="btn-tools">Eraser</button> 
        <button id="B" class="btn-tools">Marker</button>
      </td>
    </tr>
    <tr>
      <td>Shapes :  </td>
      <td>
        <button id="M" class="btn-tools">Line</button>
        <button id="O" class="btn-tools">Square</button>
        <button id="N" class="btn-tools">Ellipse</button>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><button id="clear" class="btn-clear">Clear</button></td>
    </tr>
  </table>
  </div>
    
  <div class="sketch">
    <canvas id="paint" width="800" height="480" style="border:1px solid #787272;"></canvas>
  </div>

  <script src="js/jquery-1.12.2.min.js"></script>
  <script src ="js/canvas.js"> </script>
  <script src="js/jscolor.js"></script>
</div>
@endsection
