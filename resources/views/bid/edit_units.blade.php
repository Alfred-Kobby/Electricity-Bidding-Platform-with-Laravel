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

               <h2>Units Available</h2>

               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                <div class="panel-body">
            <!--<form>-->
              <form method="post" action="/bid_unit{{ isset($data['uni']) ? '/' . $data['uni']->id . '/update' : '' }}"> 
                            {{csrf_field()}}
                            @if(isset($data['uni']))
                                {{method_field('PUT')}}
                            @endif
                  <div class="form-row"> 
               
                          <div class="form-group col-md-2>
                            <label for="1"><h4>Hour 1</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_1" name="_1" value="{{isset($data['uni']) ? $data['uni']->_1 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="2"><h4>Hour 2<h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_2" name="_2" value="{{isset($data['uni']) ? $data['uni']->_2 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="3"><h4>Hour 3<h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_3" name="_3" value="{{isset($data['uni']) ? $data['uni']->_3 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="4"><h4>Hour 4</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_4" name="_4" value="{{isset($data['uni']) ? $data['uni']->_4 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="5"><h4>Hour 5</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_5" name="_5" value="{{isset($data['uni']) ? $data['uni']->_5 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="6"><h4>Hour 6</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_6" name="_6" value="{{isset($data['uni']) ? $data['uni']->_6 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="7"><h4>Hour 7</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_7" name="_7" value="{{isset($data['uni']) ? $data['uni']->_7 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="p8"><h4>Hour 8</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_8" name="_8" value="{{isset($data['uni']) ? $data['uni']->_8 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="9"><h4>Hour 9</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_9" name="_9" value="{{isset($data['uni']) ? $data['uni']->_9 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="10"><h4>Hour 10</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_10" name="_10" value="{{isset($data['uni']) ? $data['uni']->_10 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="11"><h4>Hour 11</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_11" name="_11" value="{{isset($data['uni']) ? $data['uni']->_11 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="12"><h4>Hour 12</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_12" name="_12" value="{{isset($data['uni']) ? $data['uni']->_12 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="13"><h4>Hour 13</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_13" name="_13" value="{{isset($data['uni']) ? $data['uni']->_13 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="14"><h4>Hour 14</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_14" name="_14" value="{{isset($data['uni']) ? $data['uni']->_14 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="1"><h4>Hour 15</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_15" name="_15" value="{{isset($data['uni']) ? $data['uni']->_15 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="2"><h4>Hour 16<h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_16" name="_16" value="{{isset($data['uni']) ? $data['uni']->_16 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="3"><h4>Hour 17<h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_17" name="_17" value="{{isset($data['uni']) ? $data['uni']->_17 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="4"><h4>Hour 18</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_18" name="_18" value="{{isset($data['uni']) ? $data['uni']->_18 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="5"><h4>Hour 19</h4></label>
                           <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_19" name="_19" value="{{isset($data['uni']) ? $data['uni']->_19 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="6"><h4>Hour 20</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_20" name="_20" value="{{isset($data['uni']) ? $data['uni']->_20 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="21"><h4>Hour 21</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_21" name="_21" value="{{isset($data['uni']) ? $data['uni']->_21 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="22"><h4>Hour 22</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_22" name="_22" value="{{isset($data['uni']) ? $data['uni']->_22 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="23"><h4>Hour 23</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_23" name="_23" value="{{isset($data['uni']) ? $data['uni']->_23 : '' }}">
                          </div>
                          <div class="form-group col-md-2>
                            <label for="24"><h4>Hour 24</h4></label>
                            <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="_24" name="_24" value="{{isset($data['uni']) ? $data['uni']->_24 : '' }}">
                          </div>
                        </div>
                      </div>
                      
                            <hr>
                          <div class="panel-footer">
                          <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
                          <p class="invisible">  <input type="text" name="name" id="name" value="<?php echo $name; ?>" /?"></p>
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