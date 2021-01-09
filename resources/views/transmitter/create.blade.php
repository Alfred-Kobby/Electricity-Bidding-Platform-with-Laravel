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
              <h2>Power Producer Registration Form</h2>
              <hr>
              @include ('layouts.errors')

                <h3 class="card-title">

                    <div class="panel panel-default">
     <div class="panel-heading">General Information</div>
     <hr>
        <div class="panel-body">
    <!--<form action="PowerProducerController@store" method="POST">-->
      {!! Form::open(['action'=>'TransmitterController@store', 'method' =>'POST']) !!}
       {{ csrf_field() }}
       
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="transmitter_name"><h4>Name of Transmitter</h4></label>
              <input type="text" class="form-control" id="transmitter_name" name="transmitter_name" required>
            </div>
            <div class="form-group col-md-4">
              <label for="email_address"><h4>Email Address</h4></label>
              <input type="email" class="form-control" id="email_address" name="email_address" required>
            </div>
             <div class="form-group col-md-4">
                <label for="postal_address"><h4>Postal Address</h4></label>
                <input type="text" class="form-control" id="postal_address" name="postal_address" required>
             </div>
            <div class="form-group col-md-4">
               <label for="digital_address"><h4>Digital Address</h4></label>
               <input type="text" class="form-control" id="digital_address" name="digital_address" required>
            </div>
            <div class="form-group col-md-4">
              <label for="phone_contact"><h4>Phone Contact</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="phone_contact" name="phone_contact" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-4">
              <label for="location_of_control_center"><h4>Location of Control Center</h4></label>
              <input type="text" class="form-control" id="location_of_control_center" name="location_of_control_center" required>
            </div>
            
          </div>
        </div>



    <div class="panel-heading">Techincal Information</div>
    <hr>
    <div class="panel-body">
      <div class="form-row">

            <div class="form-group col-md-6">
              <label for="total_num_of_transmission_lines"><h4>Total Number of Transmission Lines</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_num_of_transmission_lines" name="total_num_of_transmission_lines" required>
            </div>

            <div class="form-group col-md-6">
              <label for="total_cap_of_transmission_lines"><h4>Total Capacity of Transmission Lines (MW)</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_cap_of_transmission_lines" name="total_cap_of_transmission_lines" required>
            </div>


            <div class="form-group col-md-6">
              <label for="transmission_voltage_level_required"><h4>Transmission Voltage Level Required</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="transmission_voltage_level_required" name="transmission_voltage_level_required" required>
            </div>

            <div class="form-group col-md-6">
              <label for="transmission_frequency_level_required"><h4>Transmission Frequency Level Required</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="transmission_frequency_level_required" name="transmission_frequency_level_required" required>
            </div>
     </div>
    </div>
    <hr>

    <div class="panel-heading">Financial Parameters </div>
     <hr>
          <div class="panel-body">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="transmission_charge"><h4>Transmission Charge (GHp/kWh)</h4></label>
              <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="transmission_charge" name="transmission_charge" required>
              </div>
          </div>
    <hr>
    
            
    <div class="panel-heading">Primary Market Coordinator</div>
    <hr>
    <div class="panel-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="p_full_name"><h4>Full Name</h4></label>
              <input type="text" class="form-control" id="p_full_name" name="p_full_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="designation"><h4>Title</h4></label>
              <input type="text" class="form-control" id="p_title" name="p_title" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_cell_phone"><h4>Cell Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_cell_phone" name="p_cell_phone" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="other_phone"><h4>Other Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_other_phone" name="p_other_phone" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email"><h4>Email</h4></label>
              <input type="email" class="form-control" id="p_email" name="p_email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_"><h4>Fax Number</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_fax_number" name="p_fax_number" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="username"><h4>Username</h4></label>
              <input type="text" class="form-control" id="p_username" name="p_username" required>
            </div>
            <div class="form-group col-md-6">
              <label for="password"><h4>Password</h4></label>
              <input type="password" minlength="8" class="form-control" id="p_password" name="p_password" required>
            </div>
          </div>
        </div>
        <hr>

        <div class="panel-heading">Secondary Market Coordinator</div>
    <hr>
    <div class="panel-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="s_full_name"><h4>Full Name</h4></label>
              <input type="text" class="form-control" id="s_full_name" name="s_full_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_designation"><h4>Title</h4></label>
              <input type="text" class="form-control" id="s_title" name="s_title" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_cell_phone"><h4>Cell Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_cell_phone" name="s_cell_phone" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="other_phone"><h4>Other Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_other_phone" name="s_other_phone" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email"><h4>Email</h4></label>
              <input type="email" class="form-control" id="s_email" name="s_email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="fax_number"><h4>Fax Number</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_fax_number" name="s_fax_number" minlength="10" maxlength="10" value="02" required>
            </div>
            <div class="form-group col-md-6">
              <label for="username"><h4>Username</h4></label>
              <input type="text" class="form-control" id="s_username" name="s_username" required>
            </div>
            <div class="form-group col-md-6">
              <label for="password"><h4>Password</h4></label>
              <input type="password" minlength="8" class="form-control" id="s_password" name="s_password" required>
            </div>
          </div>
        </div>
    
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
        </div>
      

      @include('operator.partials.footer')
</body>

</html>