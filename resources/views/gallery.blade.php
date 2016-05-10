@extends('layouts.app2')

@section('title')
    <title>We Draw! - Gallery</title>
@endsection

@section('content')
<div class="content">
  <h3>GALLERY</h3>

  <div class="gallery">
    <div class="table-responsive">
  	<table class="table">
  	  <tr>
  	  	<td><a href=#>
  	  	  <img onclick="myFunction(this.id)" data-toggle="modal" data-target="#myModal" id="image" src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png">
  	  	</a></td>
  	  	<td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
  	  	<td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
  	  </tr>

  	  <tr>
  	  	<td class="title">Image Title<br>Image Owner</td>
  	  	<td class="title">Image Title<br>Image Owner</td>
  	  	<td class="title">Image Title<br>Image Owner</td>
  	  </tr>

  	  <tr>
  	  	<td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
  	  	<td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
  	  	<td><img src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png"></td>
  	  </tr>

  	  <tr>
        <td class="title">Image Title<br>Image Owner</td>
        <td class="title">Image Title<br>Image Owner</td>
        <td class="title">Image Title<br>Image Owner</td>
      </tr>
  	</table>
    </div>

  	<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Image Title</h4>
          </div>
          
          <div class="modal-body">
            <img src="" id="modal-image">
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL-->
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  function myFunction(clicked_id) {
    q = document.getElementById(clicked_id).src;
    document.getElementById('modal-image').src=q;
  }
  </script>
</div>
@endsection
