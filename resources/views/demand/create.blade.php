<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Bulk Customer Dashboard
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
  <div class="wrapper">
    
  @include('bulkcustomer.partials.navbar')

      <div class="content">
        <h1 class="header 1">Forecast Demand Form</h1>
        {!! Form::open(['action'=>'PowerDemandController@store', 'method' =>'POST']) !!}
@include ('layouts.errors')

        <div class="row">
          <div class="col-md-6">
            <div class="card ">

          <?php 
              if (Auth::check()) {
                $name = Auth::user()->username;
                 
              }      
          ?> 

          

            <div class="card-body">
                
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Hour (hr)
                        </th>
                        <th>
                          Demand (MW)
                        </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_1" id="_1">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_2" id="_2">
                        </td>
                      
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_3" id="_3">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          4
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_4" id="_4">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          5
                        </td>
                        <td>
                         <input type="number" min="0" oninput="validity.valid||(value);" name="_5" id="_5">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          6
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_6" id="_6">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          7
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_7" id="_7">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          8
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_8" id="_8">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          9
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_9" id="_9">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          10
                        </td>
                        <td>
                         <input type="number" min="0" oninput="validity.valid||(value);" name="_10" id="_10"> 
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          11
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_11" id="_11">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          12
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_12" id="_12">
                        </td>
                       
                      </tr>
                    </tbody>
                  </table>
                
              </div>             
              
            </div>
          </div>


          <div class="col-md-6">
            <div class="card ">
             
                <div class="card-body">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Hour (hr)
                        </th>
                        <th>
                          Demand (MW)
                        </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          13
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_13" id="_13">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          14
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_14" id="_14">
                        </td>
                      
                      </tr>
                      <tr>
                        <td>
                          15
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_15" id="_15">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          16
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_16" id="_16">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          17
                        </td>
                        <td>
                         <input type="number" min="0" oninput="validity.valid||(value);" name="_17" id="_17">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          18
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_18" id="_18">
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          19
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_19" id="_19">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          20
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_20" id="_20">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          21
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_21" id="_21">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          22
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_22" id="_22">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          23
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_23" id="_23">
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          24
                        </td>
                        <td>
                          <input type="number" min="0" oninput="validity.valid||(value);" name="_24" id="_24">
                        </td>
                       
                      </tr>
                    </tbody>
                  </table>
                
              </div>

            </div>
          </div>
            {{Form::submit('Submit Demand',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
        
           <p class="invisible">  <input type="text" name="name" id="name" value="<?php echo $name; ?>" /?"></p>
             
               
            
          

          </div>

      

        
    @include('bulkcustomer.partials.footer')
</body>

</html>