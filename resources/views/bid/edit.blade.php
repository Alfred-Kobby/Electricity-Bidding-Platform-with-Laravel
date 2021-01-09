<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Producer Dashboard
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
</head>

<body class="">
  
      @include('producer.partials.navbar')

      <div class="content">

         <div class="row">
          <div class="col-md-12 col-md-offset-4">
            <div class="card">
              <div class="card-header">

              <?php 
              if (Auth::check()) {
                $name = Auth::user()->username;
                 
              }      
          ?> 

               <h2>Bidding Interface<a href="{{url('/bid/edit_units/' .$unit_id)}}" class="pull-right btn btn-primary">Edit Units Avaliable</a></h2>

               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">
                <div class="panel-heading">Technical Parameters</div>

                <div class="panel-body">
            <!--<form>-->
             <form method="post" action="/bid{{ isset($data['bid']) ? '/' . $data['bid']->id . '/update' : '' }}"> 
                            {{csrf_field()}}
                            @if(isset($data['bid']))
                                {{method_field('PUT')}}
                            @endif
                             
                  <div class="form-row"> 
                    
                    <div class="form-group col-md-4">
                      <label for="dependable_cap"><h4>Dependable Capacity (MW)</h4></label>
                      <input type="number"  min="0" oninput="validity.valid||(value);" class="form-control" id="dependable_cap" name="dependable_cap" value="{{isset($data['bid']) ? $data['bid']->dependable_cap : '' }}">
                    </div>

                     <div class="form-group col-md-4">
                      <label for="voltage_level_of_supply"><h4>Voltage Level of Supply (kV)</h4></label>
                      <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="voltage_level_of_supply" name="voltage_level_of_supply" value="{{isset($data['bid']) ? $data['bid']->voltage_level_of_supply : '' }}">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="duration_of_supply"><h4>Duration of supply (hrs)</h4></label>
                      <input type="number" min="0"  oninput="validity.valid||(value);"  class="form-control" id="duration_of_supply" name="duration_of_supply" value="{{isset($data['bid']) ? $data['bid']->duration_of_supply : '' }}">
                    </div>

                     <div class="form-group col-md-6">
                      <label for="frequency_of_supply"><h4>Power Frequency (Hz)</h4></label>
                      <input type="number" min="0"  step="0.01" oninput="validity.valid||(value);"  class="form-control" id="frequency_of_supply" name="frequency_of_supply" value="{{isset($data['bid']) ? $data['bid']->frequency_of_supply : '' }}">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="available_factor"><h4>Power Factor</h4></label>
                      <input type="number" min="0" step="0.01" max="1" oninput="validity.valid||(value);"  class="form-control" id="available_factor" name="available_factor" value="{{isset($data['bid']) ? $data['bid']->available_factor : '' }}">
                    </div>

                  </div>
              </div>

              

                <div class="panel-heading">Financial Parameters </div>
                <hr>
                <div class="panel-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price_of_energy"><h4>Price of Energy (GHs/MWh)</h4></label>
                            <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="price_of_energy" name="price_of_energy" value="{{isset($data['bid']) ? $data['bid']->price_of_energy : '' }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="capacity_charge"><h4>Capacity Charge (GHs/MW)</h4></label>
                            <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="capacity_charge" name="capacity_charge" value="{{isset($data['bid']) ? $data['bid']->capacity_charge : '' }}">
                        </div>
                </div>
                    
                <hr>
                             
                          <div class="panel-footer">
                          <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
                          <p class="invisible">  <input type="text" name="name" id="name" value="<?php echo $name; ?>" /?"></p>
                           </div>
                            
                           
                      </div>
                                  
                                 <!--  {!!Form::close()!!} -->
              </form>

        </div>


                </h3>
              </div>
              
            </div>
          </div>
        </div>
      @include('bid.partials.footer')
</body>

</html>