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

                    <h2>Edit Bulk Customer</h2>
                    <hr>
                      @include ('layouts.errors')
                
                <h3 class="card-title">


              <div class="panel panel-default">
                 <div class="panel-heading">General Information</div>
                 <hr>
                    <div class="panel-body">
                <!--<form>-->
                   <form method="post" action="/bulkcustomer{{ isset($data['bulkCustomer']) ? '/' . $data['bulkCustomer']->customer_id . '/update' : '' }}">
                  {{ csrf_field() }}
                  @if(isset($data['bulkcustomer']))
                                {{method_field('PUT')}}
                            @endif
                   
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="organisation_name"><h4>Organisation Name</h4></label>
                          <input type="text" class="form-control" id="organisation_name" name="organisation_name" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->organisation_name : '' }}">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="conutry"><h4>Country/Region</h4></label>
                          <input type="text" class="form-control" id="country_region" name="country_region" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->country_region : '' }}">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="email_address"><h4>Email Address</h4></label>
                          <input type="email" class="form-control" id="email_address" name="email_address" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->email_address : '' }}">
                        </div>
                        <div class="form-group col-md-3">
                        <label for="postal_address"><h4>Postal Address</h4></label>
                        <input type="text" class="form-control" id="postal_address" name="postal_address" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->postal_address : '' }}" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="digital_address"><h4>Digital Address</h4></label>
                        <input type="text" class="form-control" id="digital_address" name="digital_address" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->digital_address : '' }}" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="telephone_number"><h4>Telephone Number</h4></label>
                        <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="telephone_number" name="telephone_number" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->telephone_number : '' }}" required>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="city"><h4>City</h4></label>
                        <input type="text" class="form-control" id="city" name="city" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->city : '' }}" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="physical_location"><h4>Physical Location</h4></label>
                        <input type="text" class="form-control" id="physical_location" name="physical_location" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->physical_location : '' }}" required>
                    </div>
                    <div class="form-group col-md-4">
                       <label for="customer_type"><h4>Customer Type</h4></label>
                      <select class="form-control" class="form-control" id="customer_type" name="customer_type" value="{{isset($data['powerProducer']) ? $data['powerProducer']->customer_type : '' }}" required>
                        <option>Distributor</option>
                        <option>Private Customer</option>  
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
                           <input type="text" class="form-control" id="p_full_name" name="p_full_name" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_full_name : '' }}">
                         </div>
                        <div class="form-group col-md-6">
                          <label for="p_title"><h4>Title</h4></label>
                          <input type="text" class="form-control" id="p_title" name="p_title" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_title : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="p_cell_phone"><h4>Cell Phone</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_cell_phone" name="p_cell_phone" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_cell_phone : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="p_cell_phone"><h4>Other Phone</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_other_phone" name="p_other_phone" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_other_phone : '' }}">
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label for="p_email"><h4>Email</h4></label>
                          <input type="email" class="form-control" id=p_"email" name="p_email" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_email : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="p_fax_number"><h4>Fax Number</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="p_fax_number" name="p_fax_number" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_fax_number : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="p_username"><h4>Username</h4></label>
                          <input type="text" class="form-control" id="p_username" name="p_username" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_username : '' }}" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="p_password"><h4>Password</h4></label>
                          <input type="password" class="form-control" id="p_password" minlength="8" name="p_password" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->p_password : '' }}" readonly="readonly">
                        </div>
                      </div>
                    </div>

                    <div class="panel-heading">Secondary Market Coordinator</div>
                <hr>
                <div class="panel-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="s_full_name"><h4>Full Name</h4></label>
                           <input type="text" class="form-control" id="s_full_name" name="s_full_name" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_full_name : '' }}">
                         </div>
                        <div class="form-group col-md-6">
                          <label for="s_title"><h4>Title</h4></label>
                          <input type="text" class="form-control" id="s_title" name="s_title" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_title : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="s_cell_phone"><h4>Cell Phone</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_cell_phone" name="s_cell_phone"  minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_cell_phone : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="s_cell_phone"><h4>Other Phone</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_other_phone" name="s_other_phone" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_other_phone : '' }}">
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label for="s_email"><h4>Email</h4></label>
                          <input type="email" class="form-control" id="s_email" name="s_email" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_email : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="s_fax_number"><h4>Fax Number</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="s_fax_number" name="s_fax_number" minlength="10" maxlength="10" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_fax_number : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="s_username"><h4>Username</h4></label>
                          <input type="text" class="form-control" id="s_username" name="s_username" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_username : '' }}" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="s_password"><h4>Password</h4></label>
                          <input type="password" class="form-control" id="s_password" minlength="8" name="s_password" value="{{isset($data['bulkCustomer']) ? $data['bulkCustomer']->s_password : '' }}" readonly="readonly">
                        </div>
                      </div>
                    </div>

                    <hr>
                <div class="panel-footer">
              <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
            </div>
                        
                  </form>

            </div>

                </h3>
              </div>
              
               
              </div>
            </div>
          </div>
      
      

      @include('operator.partials.footer')
</body>

</html>