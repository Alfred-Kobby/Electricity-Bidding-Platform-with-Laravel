@extends('layouts.master')

@section('content')

<br><br><br><br><br><br><br>
  <div class="page-content container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-wrapper">
          <div class="box">
            <div class="content-wrap">
              <h6>Sign In to Dashboard</h6>
              <br>
              <!-- {!!Form::open(['action'=>'LoginController@store','method'=>'POST'])!!} -->
              <!--<form name="login" method="post" action="index.php">-->
              <form method="POST" action="/">
    
                  {{ csrf_field() }}
                <input class="form-control" type="text" name="username" placeholder="Username" required>
                <input class="form-control" type="password" name="password" placeholder="Password" required>

                <div class="form-group">
                  <label class="radio-inline">
                    <input name="options" type="radio" value="producer" checked>Producer
                  </label>
                  &nbsp;
                  <label class="radio-inline">
                    <input name="options" type="radio" value="transmitter">Transmistter
                  </label>
                  &nbsp;
                   <label class="radio-inline">
                    <input name="options" type="radio" value="bulkcustomer" checked>Distributor
                  </label>
                  &nbsp;
                  <label class="radio-inline">
                    <input name="options" type="radio" value="operator">Operator
                  </label>
                  &nbsp;
                  <br><br>

               <div class="form-group">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>

      @include ('layouts.errors')


  </form>
            <div class="already">
              <p>Don't have an account yet?</p>
                 Contact Admin
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  @endsection