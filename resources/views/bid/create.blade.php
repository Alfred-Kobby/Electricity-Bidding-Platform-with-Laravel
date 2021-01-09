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

               <h2>Bidding Interface<a href="{{url('/bid/edit/' .$bid_id)}}" class="pull-right btn btn-primary">Edit Bid</a></h2>

               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">
                <div class="panel-heading">Technical Parameters</div>

                <div class="panel-body">
            <!--<form>-->
              {!!Form::open(['action'=>'BidController@store','method'=>'POST'])!!}
              {{ csrf_field() }}
                  <div class="form-row"> 
                    
                    <div class="form-group col-md-4">
                      <label for="dependable_cap"><h4>Dependable Capacity (MW)</h4></label>
                      <input type="number"  min="0" oninput="validity.valid||(value);" class="form-control" id="dependable_cap" name="dependable_cap" required>
                    </div>

                     <div class="form-group col-md-4">
                      <label for="voltage_level_of_supply"><h4>Voltage Level of Supply (kV)</h4></label>
                      <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="voltage_level_of_supply" name="voltage_level_of_supply" required>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="duration_of_supply"><h4>Duration of supply (hrs)</h4></label>
                      <input type="number" min="0" oninput="validity.valid||(value);"  class="form-control" id="duration_of_supply" name="duration_of_supply" required>
                    </div>

                     <div class="form-group col-md-6">
                      <label for="frequency_of_supply"><h4>Power Frequency (Hz)</h4></label>
                      <input type="number" min="0" oninput="validity.valid||(value);"  class="form-control" id="frequency_of_supply" name="frequency_of_supply" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="available_factor"><h4>Power Factor</h4></label>
                      <input type="number" min="0" step="0.01" max="1" oninput="validity.valid||(value);"  class="form-control" id="available_factor" name="available_factor" required>
                    </div>

                  </div>
              </div>

              

                <div class="panel-heading">Financial Parameters </div>
                <hr>
                <div class="panel-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price_of_energy"><h4>Price of Energy (GHs/MWh)</h4></label>
                            <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="price_of_energy" name="price_of_energy" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="capacity_charge"><h4>Capacity Charge (GHs/MW)</h4></label>
                            <input type="number"  min="0" step="0.01" oninput="validity.valid||(value);" class="form-control" id="capacity_charge" name="capacity_charge" required>
                        </div>
                </div>
                    
                <hr>
               <div class="panel-heading">Units Avaliable (MW)</div>
                  <hr>
                  <div class="panel-body">
                        <div class="form-row">
                          <div class="form-group col-md-2>
                            <label for="1"><h4>Hour 1</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_1" name="_1">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="2"><h4>Hour 2<h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_2" name="_2">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="3"><h4>Hour 3<h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_3" name="_3">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="4"><h4>Hour 4</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_4" name="_4">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="5"><h4>Hour 5</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_5" name="_5">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="6"><h4>Hour 6</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_6" name="_6">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="7"><h4>Hour 7</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_7" name="_7">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="p8"><h4>Hour 8</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_8" name="_8">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="9"><h4>Hour 9</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_9" name="_9">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="10"><h4>Hour 10</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_10" name="_10">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="11"><h4>Hour 11</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_11" name="_11">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="12"><h4>Hour 12</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_12" name="_12">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="13"><h4>Hour 13</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_13" name="_13">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="14"><h4>Hour 14</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_14" name="_14">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="1"><h4>Hour 15</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_15" name="_15">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="2"><h4>Hour 16<h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_16" name="_16">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="3"><h4>Hour 17<h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_17" name="_17">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="4"><h4>Hour 18</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_18" name="_18">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="5"><h4>Hour 19</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_19" name="_19">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="6"><h4>Hour 20</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_20" name="_20">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="21"><h4>Hour 21</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_21" name="_21">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="22"><h4>Hour 22</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_22" name="_22">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="23"><h4>Hour 23</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_23" name="_23">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="24"><h4>Hour 24</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_24" name="_24">
                          </div>
                        </div>
                      </div>
                      
                            <hr>
                          <div class="panel-footer">
                            {{Form::submit('Submit Bid',['class'=>'btn btn-primary'])}}
                             <p class="invisible">  <input type="text" name="name" id="name" value="<?php echo $name; ?>" /?"></p>
                           
                      </div>
                                  
                                  {!!Form::close()!!}
              <!--</form>-->

        </div>


                </h3>
              </div>
              
            </div>
          </div>
        </div>
      @include('bid.partials.footer')
</body>

</html>