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
 

    @if (Auth::guest())
      <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModal">
      Draw Now!
      </button>
    @else
      <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#roomModal">
        Draw Now!
      </button>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Please Log In First!</h4>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL-->

    <!-- Modal -->
    <div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="{{ url('/room') }}">
            {{ csrf_field() }}
          <div class="modal-body">
            <h4>Title</h4>
            <input id="title" type="text" class="form-control" name="title" placeholder="input title here..">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-lg btn-default">Draw Now!</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--END MODAL-->

</div>


@endsection