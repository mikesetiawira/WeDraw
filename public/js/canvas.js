//getting canvas on html
canvas = document.getElementById('paint')
context = canvas.getContext("2d");

//check if clicked or not
$("canvas").mousedown(function(e){
  var mouseX = e.pageX - this.offsetLeft;
  var mouseY = e.pageY - this.offsetTop;
	
  //if clicked, we are painting
  paint = true;
  addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
  redraw();
});


//moving when painting will draw
$('canvas').mousemove(function(e){
  if(paint){
    addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
    redraw();
  }
});

//if unclicked, leave paint
$('canvas').mouseup(function(e){
	if(curTool == "line" ) {
		clickX.push(start_mouse.x);
		clickY.push(start_mouse.y);
		clickDrag.push(false);
		shape.push("none");
		clickColor.push(curColor);
		clickSize.push(curSize);
		
		clickX.push(mouse.x);
		clickY.push(mouse.y);
		clickDrag.push(true);
		shape.push("none");
		clickColor.push(curColor);
		clickSize.push(curSize);
	}
	
	if(curTool == "rectangle" ) {
		clickX.push(start_mouse.x);
		clickY.push(start_mouse.y);
		clickDrag.push(false);
		shape.push("none");
		clickColor.push(curColor);
		clickSize.push(curSize);
		
		clickX.push(mouse.x);
		clickY.push(mouse.y);
		clickDrag.push(true);
		shape.push("rectangle");
		clickColor.push(curColor);
		clickSize.push(curSize);
		
	}
	
	if(curTool == "ellipse") {
		clickX.push(start_mouse.x);
		clickY.push(start_mouse.y);
		clickDrag.push(false);
		shape.push("none");
		clickColor.push(curColor);
		clickSize.push(curSize);
		
		clickX.push(mouse.x);
		clickY.push(mouse.y);
		clickDrag.push(true);
		shape.push("ellipse");
		clickColor.push(curColor);
		clickSize.push(curSize);
	}
	paint = false;
});

//if cursor leave the html, leave paint
$('canvas').mouseleave(function(e){
  paint = false;
});

//position of cursor
var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();
var shape = new Array();
var paint;

var mouse = {x: 0, y: 0};
var start_mouse = {x: 0, y: 0};


var curColor = "#AB2567";
var clickColor = new Array();

var clickSize = new Array();
var curSize = normal;
var normal = 5;
var large = 10
var huge = 15;

var envi = "none";


var clickTool = new Array();
var curTool = "Draw"

$("#input").on("input",function(e){
 if($(this).data("lastval")!= $(this).val()){
     $(this).data("lastval",$(this).val());
     //change action
     alert($(this).val());  
 };
});

$(document).ready(function(){
	$('#color').change(function() { 
		curColor = "#"+this.value;	
	});
	
	$('#height').change(function() { 
		canvas.height = parseInt(this.value);
		redraw();
	}) ;
	
	$('#width').change(function() { 
		canvas.width = parseInt(this.value);
		redraw();
	}) ;
	
	$('#size').bind('input', function() { 
		curSize = this.value;
	}) ;
	
    $('button').click(function(){
		switch(this.id) {
		case 'confirm':
			curSize = $('#size').val();
			break;
		case 'a':
			curSize = normal;
			document.getElementById("size").value = 5;
			break;
		case 'b':
			curSize = large;
			document.getElementById("size").value = 10;
			break;
		case 'c':
			curSize = huge;
			document.getElementById("size").value = 15;
			break;
		case 'A':
			curTool = "eraser";
			break;
		case 'B':
			curTool = "marker";
			break;
		case 'AA':
			envi = "clean";
			break;
		case 'BB':
			envi = "crayon";
			break;
		case 'M':
			curTool = "line";
			break;
		case 'N':
			curTool = "ellipse";
			break;
		case 'O':
			curTool = "rectangle";
			break;
		case 'clear':
			curTool = "marker";
			clickX = new Array();
			clickY = new Array();
			clickDrag = new Array();
			clickColor = new Array();
			clickSize = new Array();
			clickTool = new Array();
			shape = new Array();
			context.clearRect(0, 0, context.canvas.width, context.canvas.height);
			break;
		}
    });
});

function addClick(x, y, dragging)
{
	if(curTool != "line" && curTool != "rectangle"&& curTool != "ellipse") {
		shape.push("none");
		clickX.push(x);
		clickY.push(y);
		clickDrag.push(dragging);
		if(curTool == "eraser" || event.button == 2) {
			clickColor.push("#FFFFFF");
		} else {
			clickColor.push(curColor);
		}
		clickSize.push(curSize);
	}
	else {
		if(!dragging) {
			start_mouse.x = x;
			start_mouse.y = y;
		}
		mouse.x = x;
		mouse.y = y;
	}
	
}

//Draw the canvas
function redraw(){
  context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
  
  context.strokeStyle = "#df4b26";
  context.lineJoin = "round";
  context.lineWidth = 5;
			
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
	else {
		context.lineTo(clickX[i], clickY[i]);
		context.closePath();
		context.strokeStyle = clickColor[i];
		context.lineWidth = clickSize[i];
		context.stroke();
	}

  }
  
	if(curTool == "line") {
		context.beginPath();
		context.moveTo(start_mouse.x, start_mouse.y);
		context.lineTo(mouse.x, mouse.y);
		context.closePath();
		context.strokeStyle = curColor;
		context.lineWidth = curSize;
		context.stroke();
		
	}
	
	if(curTool == "rectangle") {
		var x = Math.min(mouse.x, start_mouse.x);
		var y = Math.min(mouse.y, start_mouse.y);
		var width = Math.abs(mouse.x - start_mouse.x);
		var height = Math.abs(mouse.y - start_mouse.y);
		context.strokeStyle = curColor;
		context.lineWidth = curSize;
		context.strokeRect(x, y, width, height);
	}
	
	if(curTool == "ellipse") {
		var x = Math.min(mouse.x, start_mouse.x);
		var y = Math.min(mouse.y, start_mouse.y);
		
		var w = Math.abs(mouse.x - start_mouse.x);
		var h = Math.abs(mouse.y - start_mouse.y);
		
		var kappa = .5522848,
		ox = (w / 2) * kappa, // control point offset horizontal
		oy = (h / 2) * kappa, // control point offset vertical
		xe = x + w,           // x-end
		ye = y + h,           // y-end
		xm = x + w / 2,       // x-middle
		ym = y + h / 2;       // y-middle
		
		context.beginPath();
		context.strokeStyle = curColor;
		context.lineWidth = curSize;
		context.moveTo(x, ym);
		context.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
		context.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
		context.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
		context.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);

		context.closePath();
		context.stroke();
		
	}
	

	if(envi == "crayon") {
    context.globalAlpha = 0.4;
	var img = document.getElementById("crayons");
    context.drawImage(img, 0, 0, context.canvas.width, context.canvas.height);
  }
  context.globalAlpha = 1;
}