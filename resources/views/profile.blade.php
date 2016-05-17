@extends('layouts.app2')

@section('content')

<div class="content">
  <div class="profile">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <td><h5>Username</h5></td>
              <td><h5>{{ Auth::user()->name }}</h5></td>
              <td><a href="#" data-toggle="modal" data-target="#setUname">Edit</a></td>
            </tr>

            <tr>
              <td><h5>Email</h5></td>
              <td><h5>{{ Auth::user()->email }}</h5></td>
              <td><a href="#" data-toggle="modal" data-target="#setEmail">Edit</a></td>
            </tr>

            <tr>
              <td><h5>Password</h5></td>
              <td></td>
              <td><a href="#" data-toggle="modal" data-target="#setPass">Edit</a></td>
            </tr>

          </table>
        </div>
      </div>

      <div class="col-md-3">
        <a class="btn btn-default" type="button" href="{{ url('/logout') }}">Logout</a>
      </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="setUname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Username</h4>
            </div>
          
            <div class="modal-body">
              <form class="form-register">
                <label>Username: {{ Auth::user()->name }}</label>
                <br>
                <input type="text" class="form-control" placeholder="New Username">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="setEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Email</h4>
            </div>
          
            <div class="modal-body">
              <form class="form-register">
                <label>Email: {{ Auth::user()->email }}</label>
                <br>
                <input type="email" class="form-control" placeholder="New Email">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="setPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
            </div>
          
            <div class="modal-body">
              <form class="form-register">
                <input type="password" class="form-control" placeholder="Current Password">
                <input type="password" class="form-control" placeholder="New Password">
                <input type="password" class="form-control" placeholder="Confirm Password">
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!--END MODAL-->
    
    <h3 id="page-title">{{ Auth::user()->name }} Gallery</h3>

    <div class="gallery">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <td><a href=#>
              <img onclick="myFunction(this.id)" data-toggle="modal" data-target="#myModal" id="image" src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png">
            </a></td>
            <td><a href=#>
              <img onclick="myFunction(this.id)" data-toggle="modal" data-target="#myModal" id="images" src="http://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/256/blue-user-icon.png">
            </a></td>
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