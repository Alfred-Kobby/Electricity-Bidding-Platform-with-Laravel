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

               <h2>Market Rules Form<a href="/operator/show_operator" class="pull-right btn btn-primary">View Market Rules</a></h2>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                  <div class="panel-heading">Add New Market Rule</div>
                 <hr>
                    <div class="panel-body">
                <!--<form>-->
              {!!Form::open(['action'=>'MarketRulesController@store','method'=>'POST'])!!}
              {{ csrf_field() }}
                   
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="reference_num"><h4>Reference Number</h4></label>
                          <input type="text" class="form-control" id="reference_num" name="reference_num" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="title"><h4>Rule Title</h4></label>
                          <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="description"><h4>Rule Description</h4></label>
                          <textarea class="form-control" id="description" name="description" required></textarea> 
                        </div>
                        
                      </div>
                    </div>

              <hr>
            <div class="panel-footer">
              {{Form::submit('Submit Details',['class'=>'btn btn-primary'])}}
          <!--<button type="submit" class="btn btn-primary">Submit Details</button>-->
           <p class="invisible">  <input type="number" name="operator_id" id="operator_id" value="<?php echo $operator_id ?>" /?"></p>
        </div>
                    
                    {!!Form::close()!!}
              <!--</form>-->

        </div>


                </h3>
              </div>
              
            </div>
            <br>
          </div>
      @include('operator.partials.footer')
</body>

</html>