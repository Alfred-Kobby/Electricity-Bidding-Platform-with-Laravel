<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Operator Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <!--{{asset('css/css/mystyles.css')}}-->
  <link href="{{asset('css/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('css/assets/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('css/assets/demo/demo.css')}}" rel="stylesheet" />
  <!-- Modal Style Sheet -->
  <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
  
</head>

 

<body class="">

  @include('operator.partials.navbar')


      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

               <h2>Market Operator Registration</h2>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                  <div class="panel-heading">General Infromation</div>
                 <hr>
                    <div class="panel-body">
                <!--<form>-->
              {!!Form::open(['action'=>'MarketOperatorController@store','method'=>'POST'])!!}
              {{ csrf_field() }}
                   
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="transmitter_name"><h4>Organisation Name</h4></label>
                          <input type="text" class="form-control" id="transmitter_name" name="transmitter_name">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="mailing_address"><h4>Email Address</h4></label>
                          <input type="email" class="form-control" id="mailing_address" name="mailing_address">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="contact_address"><h4>Contact Address</h4></label>
                          <input type="text" class="form-control" id="contact_address" name="contact_address">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="phone_contact_1"><h4>Phone Contact 1</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="phone_contact_1" maxlength="10" minlength="10" value="02" name="phone_contact_1">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="phone_contact_1"><h4>Phone Contact 2</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="phone_contact_2" name="phone_contact_2" maxlength="10" minlength="10" value="02">
                        </div>
                      </div>
                    </div>



                <div class="panel-heading">Market Coordinator</div>

                <div class="panel-body">
            
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="full_name"><h4>Full Name</h4></label>
                      <h1><input type="text" class="form-control" id="full_name" name="full_name"></h1>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="title"><h4>Title</h4></label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cell_phone"><h4>Cell Phone</h4></label>
                      <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="cell_phone" name="cell_phone" maxlength="10" minlength="10" value="02">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="other_phone"><h4>Other Phone</h4></label>
                      <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="other_phone" name="other_phone" maxlength="10" minlength="10" value="02">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email"><h4>Email</h4></label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="fax_number"><h4>Fax Number</h4></label>
                      <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="fax_number" name="fax_number" maxlength="10" minlength="10" value="02">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="username"><h4>Username</h4></label>
                      <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="password"><h4>Password</h4></label>
                      <input type="password" minlength="8" class="form-control" id="password" name="password">
                    </div>
                  </div>
              </div>
              <hr>
            <div class="panel-footer">
              {{Form::submit('Submit Details',['class'=>'btn btn-primary'])}}
          <!--<button type="submit" class="btn btn-primary">Submit Details</button>-->
        </div>
                    
                    {!!Form::close()!!}
              <!--</form>-->

        </div>


                </h3>
              </div>
              
            </div>
          </div>
      @include('operator.partials.footer')
</body>

</html>