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
	loadCanvas();
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
		shape.push("line");
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

	if(curTool != "line" && curTool != "rectangle"&& curTool != "ellipse") {
		shape = shape.concat(tempShape);
		clickX = clickX.concat(tempX);
		clickY = clickY.concat(tempY);
		clickDrag = clickDrag.concat(tempDrag);
		clickColor = clickColor.concat(tempColor);
		clickSize = clickSize.concat(tempSize);

		tempX = new Array();
		tempY = new Array();
		tempDrag = new Array();
		tempShape = new Array();
		tempColor = new Array();
		tempSize = new Array();
	}

	paint = false;

	storeCanvas();
	updateImage();
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


var curColor = "#"+$('#color').val();
var clickColor = new Array();

var clickSize = new Array();
var curSize = $('#size').val();
var normal = 5;
var large = 10
var huge = 15;

var envi = "none";


var clickTool = new Array();
var curTool = "Draw"

var id;

// TEMP for marker
var tempX = new Array();
var tempY = new Array();
var tempDrag = new Array();
var tempShape = new Array();
var tempColor = new Array();
var tempSize = new Array();

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
			curColor = "#"+$('#color').val();
			break;
		case 'AA':
			envi = "clean";
			break;
		case 'BB':
			envi = "crayon";
			break;
		case 'M':
			curTool = "line";
			curColor = "#"+$('#color').val();
			break;
		case 'N':
			curTool = "ellipse";
			curColor = "#"+$('#color').val();
			break;
		case 'O':
			curTool = "rectangle";
			curColor = "#"+$('#color').val();
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
			storeCanvas();
			break;
		case 'save':
			if (confirm("Are you sure to save this image?\nYou will not be able to edit this image anymore.")) {
				updateImage();
				$.ajax({
			      url: id + '/saveImage',
			      type: 'put',
			      async: false,
			      error: function() {
			      	alert("Save image error");
			      },
			    });
			    window.location.replace("../gallery");
			}
		}
    });

    $.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	id = $('meta[name=room_id]').attr('content');
	loadCanvas();
	redraw();
});

function addClick(x, y, dragging)
{
	if(curTool != "line" && curTool != "rectangle"&& curTool != "ellipse") {
		tempShape.push("marker");
		tempX.push(x);
		tempY.push(y);
		tempDrag.push(dragging);
		if(curTool == "eraser") {
			tempColor.push("#FFFFFF");
		} else {
			tempColor.push(curColor);
		}
		tempSize.push(curSize);
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
  if (paint) {
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

	if(curTool != "line" && curTool != "rectangle"&& curTool != "ellipse") {
		for(var i=0; i < tempX.length; i++) {		
    		context.beginPath();
	    	if(tempDrag[i] && i){
	      		context.moveTo(tempX[i-1], tempY[i-1]);
	     	}
	     	else{
	       		context.moveTo(tempX[i], tempY[i]);
	    	}

	    	context.lineTo(tempX[i], tempY[i]);
			context.closePath();
			context.strokeStyle = tempColor[i];
			context.lineWidth = tempSize[i];
			context.stroke();

	    }
	}

  }

	if(envi == "crayon") {
    context.globalAlpha = 0.4;
	var img = document.getElementById("crayons");
    context.drawImage(img, 0, 0, context.canvas.width, context.canvas.height);
  }
  context.globalAlpha = 1;
}


function loadCanvas() {
	$.ajax({
		url: id + '/load',
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

function storeCanvas() {
	var json = JSON.stringify({
		x: clickX,
		y: clickY,
		drag: clickDrag,
		shape: shape,
		color: clickColor,
		size: clickSize
	});
	
	$.ajax({
      url: id + '/store',
      type: 'put',
      data: {json: json},
      error: function() {
      	alert("Store error");
      },
    });
}

function updateImage() {
	var img = canvas.toDataURL("image/png");
	//alert(typeof img);

	$.ajax({
      url: id + '/updateImage',
      type: 'put',
      data: {image: img},
      error: function() {
      	alert("Update image error");
      },
    });
}

function isCompleted() {
	var result;
	$.ajax({
      url: id + '/status',
      type: 'get',
      async: false,
      success: function(data) {
      	result = data;
      },
    });
    return result == "completed";
}

setInterval(function () {
	if (!paint) {
		loadCanvas();
		redraw();
	}
	//alert(isCompleted());
	if (isCompleted()){
		alert("This room is completed and now will be closed.");
		window.location.replace("../gallery");
	}
}, 3000);

setInterval(function () {
	updateImage();
}, 10000);

//membuat function untuk tombol like
$(document).ready(function() {

    $('.likeButton').click(function() {

        var contentId = $(this).attr('rel');
        var link = this;

        if(!$(link).hasClass('liked')) {
            $.post("like.php", { Id: contentId }).done(function(data) {         
                if(data) {
                    $(link).addClass('liked');
                    $(link).html('liked');
                }
            });
        }

    });
});


function uneditables(){
	//lockedcanvas ini entar buat dibikin gabisa diedit
	var lockedcanvas  = document.getElementById('paint');
	
	for (var i = 0, len = lockedcanvas.length; i < len; ++i) {
    lockedcanvas[i].contentEditable = "false";
}
}
