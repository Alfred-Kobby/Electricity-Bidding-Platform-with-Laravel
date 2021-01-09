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
                <h2>Edit Power Producer</h2>
                <hr>
                @include ('layouts.errors')

                <h3 class="card-title">

                <div class="panel panel-default">
                  <div class="panel-heading">Main Address</div>
                <hr>

                   <div class="panel-body">
    
     <form method="post" action="/producer{{ isset($data['powerProducer']) ? '/' . $data['powerProducer']->producer_id . '/update' : '' }}"> 
        {{csrf_field()}}
                            @if(isset($data['powerProducer']))
                                {{method_field('PUT')}}
                            @endif
       
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="organisation_name"><h4>Organisation Name</h4></label>
              <input type="text" class="form-control" id="organisation_name" name="organisation_name" value="{{isset($data['powerProducer']) ? $data['powerProducer']->organisation_name : '' }}" required>
            </div>
            <div class="form-group col-md-3">
              <label for="email_address"><h4>Email Address</h4></label>
              <input type="email" class="form-control" id="email_address" name="email_address" value="{{isset($data['powerProducer']) ? $data['powerProducer']->email_address : '' }}" required>
            </div>
            <div class="form-group col-md-3">
              <label for="postal_address"><h4>Postal Address</h4></label>
              <input type="text" class="form-control" id="postal_address" name="postal_address" value="{{isset($data['powerProducer']) ? $data['powerProducer']->postal_address : '' }}" required>
            </div>
            <div class="form-group col-md-3">
              <label for="digital_address"><h4>Digital Address</h4></label>
              <input type="text" class="form-control" id="digital_address" name="digital_address" value="{{isset($data['powerProducer']) ? $data['powerProducer']->digital_address : '' }}" required>
            </div>
            <div class="form-group col-md-3">
              <label for="telephone_number"><h4>Telephone Number</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="telephone_number" name="telephone_number" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->telephone_number : '' }}" required>
            </div>
            
            <div class="form-group col-md-3">
              <label for="city"><h4>City</h4></label>
              <input type="text" class="form-control" id="city" name="city" value="{{isset($data['powerProducer']) ? $data['powerProducer']->city : '' }}" required>
            </div>
            <div class="form-group col-md-3">
              <label for="physical_location"><h4>Physical Location</h4></label>
              <input type="text" class="form-control" id="physical_location" name="physical_location" value="{{isset($data['powerProducer']) ? $data['powerProducer']->physical_location : '' }}" required>
          </div>
        </div>
        <hr>


     <div class="panel-heading">Techincal Infromation</div>
    <hr>
    <div class="panel-body">
      <div class="form-row">

            <div class="form-group col-md-4">
              <label for="total_min_installed_capacity"><h4>Total Minimum Installed Capacity (MW)</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_min_installed_capacity" name="total_min_installed_capacity" value="{{isset($data['powerProducer']) ? $data['powerProducer']->total_min_installed_capacity : '' }}" required>
            </div>

            <div class="form-group col-md-4">
              <label for="total_max_installed_capacity"><h4>Total Maximum Installed Capacity (MW)</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_max_installed_capacity" name="total_max_installed_capacity" value="{{isset($data['powerProducer']) ? $data['powerProducer']->total_max_installed_capacity : '' }}" required>
            </div>

            <div class="form-group col-md-4">
              <label for="total_cap_of_transmission_lines"><h4>Capacity of Transmission Line (MW)</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_cap_of_transmission_lines" name="total_cap_of_transmission_lines" value="{{isset($data['powerProducer']) ? $data['powerProducer']->total_cap_of_transmission_lines : '' }}" required>
            </div>

            <div class="form-group col-md-6">
              <label for="total_len_of_transmission_lines"><h4>Lenght of Transmission Line (km)</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="total_len_of_transmission_lines" name="total_len_of_transmission_lines" value="{{isset($data['powerProducer']) ? $data['powerProducer']->total_len_of_transmission_lines : '' }}" required>
            </div>

            <div class="form-group col-md-6">
              <label for="gen_source"><h4>Generation Source</h4></label>
              <select class="form-control" class="form-control" id="gen_source" name="gen_source" value="{{isset($data['powerProducer']) ? $data['powerProducer']->gen_source : '' }}" required>
                        <option>Hydro Electric</option>
                        <option>Thermal</option>
                        <option>Renewable Source</option>  
              </select>
            </div>
     </div>
    </div>
    <hr>

 
          
    <div class="panel-heading">Primary Market Coordinator</div>
    <hr>
    <div class="panel-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="p_full_name"><h4>Full Name</h4></label>
              <input type="text" class="form-control" id="p_full_name" name="p_full_name" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_full_name : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_title"><h4>Title</h4></label>
              <input type="text" class="form-control" id="p_title" name="p_title" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_title : '' }}">
            </div>
            <div class="form-group col-md-6">
              <label for="p_cell_phone"><h4>Cell Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_cell_phone" name="p_cell_phone" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_cell_phone : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_other_phone"><h4>Other Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_other_phone" name="p_other_phone" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_other_phone : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_email"><h4>Email</h4></label>
              <input type="email" class="form-control" id="p_email" name="p_email" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_email : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_fax_number"><h4>Fax Number</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_fax_number" name="p_fax_number" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_fax_number : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_username"><h4>Username</h4></label>
              <input type="text" class="form-control" id="p_username" name="p_username" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_username : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="p_password"><h4>Password</h4></label>
              <input type="password" class="form-control" id="p_password" minlength="8" name="p_password" value="{{isset($data['powerProducer']) ? $data['powerProducer']->p_password : '' }}" readonly="readonly">
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
              <input type="text" class="form-control" id="s_full_name" name="s_full_name" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_full_name : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_title"><h4>Title</h4></label>
              <input type="text" class="form-control" id="s_title" name="s_title" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_title : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_cell_phone"><h4>Cell Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_cell_phone" name="s_cell_phone" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_cell_phone : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_other_phone"><h4>Other Phone</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_other_phone" name="s_other_phone" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_other_phone : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_email"><h4>Email</h4></label>
              <input type="email" class="form-control" id="s_email" name="s_email" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_email : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="fax_number"><h4>Fax Number</h4></label>
              <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_fax_number" name="s_fax_number" minlength="10" maxlength="10" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_fax_number : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_username"><h4>Username</h4></label>
              <input type="text" class="form-control" id="s_username" name="s_username" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_username : '' }}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="s_password"><h4>Password</h4></label>
              <input type="password" class="form-control" id="s_password" minlength="8" name="s_password" value="{{isset($data['powerProducer']) ? $data['powerProducer']->s_password : '' }}" readonly="readonly">
            </div>
          </div>
        </div>


    

            <div class="panel-footer">
             <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
            </div>
         </div>
          </form>

                    
      

                </h3>
              </div>
    
            </div>
          </div>
        </div>
      
      

      @include('operator.partials.footer')
</body>

</html>