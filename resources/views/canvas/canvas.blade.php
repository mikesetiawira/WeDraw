@extends('layouts.app2')

@section('title')
    <title>Canvas!</title>
@endsection

@section('content')
<div class="content">
    <img id="crayons" src="crayontexture.png" hidden> 
    <p>
    Color: <input id="color" class="jscolor" value="ab2567">
    </p>
    <p>
    Size    :   
    <input id="size" value="10"> 
    <button id="a">Normal</button> 
    <button id="b">Large</button> 
    <button id="c">Huge</button>
    </p>
    <p>
    Tools   :
    <button id="A">Eraser</button> 
    <button id="B">Marker</button> 
    <button id="C">Crayon</button> 
    </p>
    <button id="clear">Clear</button><br/><br/>
    <canvas id="paint" width="490" height="220" style="background: white; border:1px solid #c3c3c3;"></canvas>

    <script src="js/jquery-1.12.2.min.js"></script>
    <script src ="js/canvas.js"> </script>
    <script src="js/jscolor.js"></script>
    
</div>
@endsection
