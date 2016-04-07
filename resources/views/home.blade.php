@extends('layouts.app2')

@section('title')
    <title>We Draw!</title>
@endsection

@section('content')
<div class="content">
    <h3>POPULAR THIS WEEK</h3>
  
    <div id="mySlider" class="slider slide" data-ride="slider">
        <ol class="slider-indicators">
            <li data-target="#mySlider" data-slide-to="0" class="active"></li>
            <li data-target="#mySlider" data-slide-to="1"></li>
            <li data-target="#mySlider" data-slide-to="2"></li>
        </ol>
        <div class="slider-inner" role="listbox">
            <div class="item active">
          
            </div>
            <div class="item">
         
            </div>
            <div class="item">
      
            </div>
        </div>
        <a class="left slider-control" href="#mySlider" role="button" data-slide="prev">
            <img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-prev.png">
        </a>
        <a class="right slider-control" href="#mySlider" role="button" data-slide="next">
            <img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-next.png">
        </a>
    </div>
 
    <a class="btn btn-lg btn-default" type="button" href="{{ url('/canvas') }}">Draw Now!</a>
    @if(Auth::guest())

        @if(Request::is('canvas'))
            <br></br>
            <div class="Textbox"><p>Harap Login terlebih dahulu<p></div>
        @endif
    @endif
</div>
@endsection
