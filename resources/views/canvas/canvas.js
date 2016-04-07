//getting canvas on html
context = document.getElementById('paint').getContext("2d");

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
var paint;

var curColor = "#AB2567";
var clickColor = new Array();

var clickSize = new Array();
var curSize = normal;
var normal = 5;
var large = 10
var huge = 15;

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
		case 'C':
			curTool = "crayon";
			break;
		case 'clear':
			clickX = new Array();
			clickY = new Array();
			clickDrag = new Array();
			clickColor = new Array();
			clickSize = new Array();
			clickTool = new Array();
			context.clearRect(0, 0, context.canvas.width, context.canvas.height);
			break;
		}
    });
});

function addClick(x, y, dragging)
{
  clickX.push(x);
  clickY.push(y);
  clickDrag.push(dragging);
  if(curTool == "eraser") {
	clickColor.push("#FFFFFF");
  } else {
	clickColor.push(curColor);
  }
  clickSize.push(curSize);
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
       context.moveTo(clickX[i]-1, clickY[i]);
     }
     context.lineTo(clickX[i], clickY[i]);
     context.closePath();
	 context.strokeStyle = clickColor[i];
	 context.lineWidth = clickSize[i];
     context.stroke();
  }
   if(curTool == "crayon") {
    context.globalAlpha = 0.4;
	var img = document.getElementById("crayons");
    context.drawImage(img, 0, 0, context.canvas.width, context.canvas.height);
  }
  context.globalAlpha = 1;
}