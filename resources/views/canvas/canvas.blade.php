@extends('layouts.app2')

@section('title')
    <title>Canvas!</title>
@endsection

@section('content')
<div class="content">
    <img id="crayons" src="crayontexture.png" hidden> 
        
    <p>
    Canvas Size :
    <input id="height" value="220"> x <input id="width" value="490"> 
    </p>

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
    Environment :
    <button id="AA">Clean</button> 
    <button id="BB">Crayon</button> 
    </p>

    <p>
    Tools   :
    <button id="A">Eraser</button> 
    <button id="B">Marker</button> 
    </p>

    <p>
    Shapes :
    <button id="M">Line</button>
    <button id="O">Square</button>
    <button id="N">Ellipse</button>
    </p>

    <button id="clear">Clear</button><br/><br/>

    <div id="sketch">
       <canvas id="paint" width="490" height="220" style="border:1px solid #787272;"></canvas>
    </div>

    <script src="js/jquery-1.12.2.min.js"></script>
    <script src ="js/canvas.js"> </script>
    <script src="js/jscolor.js"></script>
    <script src="js/jscolor.min.js"></script>
    <script src="js/shape.js"></script>
</div>
@endsection
