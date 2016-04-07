@extends('layouts.app2')

@section('content')

<div class="content">
  <form class="form-register" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}
    <h2 class="form-register-heading">REGISTER</h2>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="inputUsername" class="sr-only">Username</label>

       
            <input type="username" id="inputUsername" class="form-control" placeholder="username" required autofocus name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
       
    </div>


    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="sr-only">E-Mail Address</label>

     
            <input type="email" id="inputEmail" class="form-control" placeholder="email address" required autofocus name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

    </div>




     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="sr-only">Password</label>

    
            <input type="password" id="inputPassword" class="form-control" placeholder="password" required name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    
    </div>



    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="sr-only">Confirm Password</label>

            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="confirm password" required name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
       
    </div>


     <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </div>
  </form>
</div>
@endsection
