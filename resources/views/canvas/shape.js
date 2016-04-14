//getting canvas on html
context = document.getElementById('paint').getContext("2d");
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

//check if clicked or not
$("canvas").mousedown(function(e){
  var mouseX = e.pageX - this.offsetLeft;
  var mouseY = e.pageY - this.offsetTop;
	
  //if clicked, we are painting
  paint = true;
  addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
  redraw();
});
//save the x and y position of mouse
var start_mouse = {x: 0, y: 0};
// ...
tmp_canvas.addEventListener('mousedown', function(e) {
    tmp_canvas.addEventListener('mousemove', onPaint, false);
 
    mouse.x = typeof e.offsetX !== 'undefined' ? e.offsetX : e.layerX;
    mouse.y = typeof e.offsetY !== 'undefined' ? e.offsetY : e.layerY;
 
    start_mouse.x = mouse.x;
    start_mouse.y = mouse.y;
 
    onPaint();
}, false);
//draw the line
var onPaint = function() {
 
    // Tmp canvas is always cleared up before drawing.
    tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);
 
    tmp_ctx.beginPath();
    tmp_ctx.moveTo(start_mouse.x, start_mouse.y);
    tmp_ctx.lineTo(mouse.x, mouse.y);
    tmp_ctx.stroke();
    tmp_ctx.closePath();
 
};
//square
var onPaint = function() {
 
    var x = Math.min(mouse.x, start_mouse.x);
var y = Math.min(mouse.y, start_mouse.y);
var width = Math.abs(mouse.x - start_mouse.x);
var height = Math.abs(mouse.y - start_mouse.y);
tmp_ctx.strokeRect(x, y, width, height);
};
//circle
var onPaint = function() {
 
    // Tmp canvas is always cleared up before drawing.
    tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);
 
    var x = (mouse.x + start_mouse.x) / 2;
    var y = (mouse.y + start_mouse.y) / 2;
 
    var radius = Math.max(
        Math.abs(mouse.x - start_mouse.x),
        Math.abs(mouse.y - start_mouse.y)
    ) / 2;
 
    tmp_ctx.beginPath();
    tmp_ctx.arc(x, y, radius, 0, Math.PI*2, false);
    // tmp_ctx.arc(x, y, 5, 0, Math.PI*2, false);
    tmp_ctx.stroke();
    tmp_ctx.closePath();
 
};
//ellipse
function drawEllipse(ctx, x, y, w, h) {
  var kappa = .5522848;
      ox = (w / 2) * kappa, // control point offset horizontal
      oy = (h / 2) * kappa, // control point offset vertical
      xe = x + w,           // x-end
      ye = y + h,           // y-end
      xm = x + w / 2,       // x-middle
      ym = y + h / 2;       // y-middle
 
  ctx.beginPath();
  ctx.moveTo(x, ym);
  ctx.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
  ctx.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
  ctx.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
  ctx.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
  ctx.closePath();
  ctx.stroke();
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
		
		case 'line':
			curTool = "eraser";
			break;
		case 'square':
			curTool = "marker";
			break;
		case 'circle':
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

//addClick
function addClick(x, y, dragging)
{
  clickX.push(x);
  clickY.push(y);
  
}