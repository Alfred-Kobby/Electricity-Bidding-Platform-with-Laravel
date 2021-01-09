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

               <h2>Optimizer<a href="{{ URL::to('https://192.168.42.239') }}" class="pull-right btn btn-primary">Perform Optimiztion</a><a href="/optimizer/edit" class="pull-right btn btn-primary">Edit Bid</a></h2>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                  <div class="panel-heading">Additional Infromation</div>
                 <hr>
                    <div class="panel-body">
                <!--<form>-->
              {!!Form::open(['action'=>'OptimizerController@store','method'=>'POST'])!!}
              {{ csrf_field() }}
                   
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="reserved_cap"><h4>Reserved Capacity(MW)</h4></label>
                          <input type="number" min="0" oninput="validity.valid||(value);" class="form-control" id="reserved_cap" name="reserved_cap">
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
            <br><br><br><br><br><br><br><br><br>
          </div>
      @include('operator.partials.footer')
</body>

</html>