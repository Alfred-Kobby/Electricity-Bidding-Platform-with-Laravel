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
       @include ('layouts.errors')
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Total dispatch</h5>
                    <h2 class="card-title">Today's Dispatch</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">ECG</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>
                  <?php 
                    if(count($demand1)>0 || count($demand2)>0 || count($demand3)>0){
                       foreach ($demand1 as $demands){
                      
                    }
                      echo $demands->total_demand;
                  
                    }
                   ?> MW
                </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">NedCo</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 

                    <?php 
                    if(count($demand1)>0 || count($demand2)>0 || count($demand3)>0){
                       foreach ($demand2 as $demands){
                      
                    }
                      echo $demands->total_demand;
                  
                    }
                   ?> MW

                </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Others</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 

                    <?php 
                    if(count($demand1)>0 || count($demand2)>0 || count($demand3)>0){
                       foreach ($demand3 as $demands){
                      
                    }
                      echo $demands->total_demand;
                  
                    }
                   ?> MW

                </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

         @if (count($demand1)>0)
        @foreach ($demand1 as $demand)
        @endforeach
      @else
        
      @endif

      @if (count($demand2)>0)
        @foreach ($demand2 as $demand_2)
        @endforeach
      @else

      @endif
      @if (count($demand3)>0)
  @foreach ($demand3 as $demand_3)
  @endforeach
@else

@endif
      
  <!-- Variables -->
  <script> var variable = [<?php echo $demand->_1?>,<?php echo $demand->_2?>,<?php echo $demand->_3?>,<?php echo $demand->_4?>,<?php echo $demand->_5?>,<?php echo $demand->_6?>,<?php echo $demand->_7?>,<?php echo $demand->_8?>,<?php echo $demand->_9?>,<?php echo $demand->_10?>,<?php echo $demand->_11?>,<?php echo $demand->_12?>,<?php echo $demand->_13?>,<?php echo $demand->_14?>,<?php echo $demand->_15?>,<?php echo $demand->_16?>,<?php echo $demand->_17?>,<?php echo $demand->_18?>,<?php echo $demand->_19?>,<?php echo $demand->_20?>,<?php echo $demand->_21?>,<?php echo $demand->_22?>,<?php echo $demand->_23?>,<?php echo $demand->_24?>];
           var variable2 = [<?php echo $demand_2->_1?>,<?php echo $demand_2->_2?>,<?php echo $demand_2->_3?>,<?php echo $demand_2->_4?>,<?php echo $demand_2->_5?>,<?php echo $demand_2->_6?>,<?php echo $demand_2->_7?>,<?php echo $demand_2->_8?>,<?php echo $demand_2->_9?>,<?php echo $demand_2->_10?>,<?php echo $demand_2->_11?>,<?php echo $demand_2->_12?>,<?php echo $demand_2->_13?>,<?php echo $demand_2->_14?>,<?php echo $demand_2->_15?>,<?php echo $demand_2->_16?>,<?php echo $demand_2->_17?>,<?php echo $demand_2->_18?>,<?php echo $demand_2->_19?>,<?php echo $demand_2->_20?>,<?php echo $demand_2->_21?>,<?php echo $demand_2->_22?>,<?php echo $demand_2->_23?>,<?php echo $demand_2->_24?>];

             var variable3 = [<?php echo $demand_3->_1?>,<?php echo $demand_3->_2?>,<?php echo $demand_3->_3?>,<?php echo $demand_3->_4?>,<?php echo $demand_3->_5?>,<?php echo $demand_3->_6?>,<?php echo $demand_3->_7?>,<?php echo $demand_3->_8?>,<?php echo $demand_3->_9?>,<?php echo $demand_3->_10?>,<?php echo $demand_3->_11?>,<?php echo $demand_3->_12?>,<?php echo $demand_3->_13?>,<?php echo $demand_3->_14?>,<?php echo $demand_3->_15?>,<?php echo $demand_3->_16?>,<?php echo $demand_3->_17?>,<?php echo $demand_3->_18?>,<?php echo $demand_3->_19?>,<?php echo $demand_3->_20?>,<?php echo $demand_3->_21?>,<?php echo $demand_3->_22?>,<?php echo $demand_3->_23?>,<?php echo $demand_3->_24?>]; </script>
      @include('operator.partials.footer')
</body>

</html>