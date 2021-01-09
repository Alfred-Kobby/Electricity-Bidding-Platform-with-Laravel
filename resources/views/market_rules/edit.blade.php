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

               <h2>Market Rules </h2>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                  <div class="panel-heading">Edit Market Rule</div>
                 <hr>
                    <div class="panel-body">
                <!--<form>-->
              <form method="post" action="/market_rules{{ isset($data['market_rules']) ? '/' . $data['market_rules']->rule_id . '/update' : '' }}"> 
                                {{csrf_field()}}
                            @if(isset($data['market_rules']))
                                {{method_field('PUT')}}
                            @endif
                   
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="reference_num"><h4>Reference Number</h4></label>
                          <input type="text" class="form-control" id="reference_num" name="reference_num" value="{{isset($data['market_rules']) ? $data['market_rules']->reference_num : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="title"><h4>Rule Title</h4></label>
                          <input type="text" class="form-control" id="title" name="title" value="{{isset($data['market_rules']) ? $data['market_rules']->title : '' }}">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="description"><h4>Rule Description</h4></label>
                          <textarea class="form-control" id="description" name="description" >{{isset($data['market_rules']) ? $data['market_rules']->description : '' }}</textarea> 
                        </div>
                        
                      </div>
                    </div>

              <hr>
            <div class="panel-footer">
              <div class="panel-footer">
             <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
            </div>
           <p class="invisible">  <input type="number" name="operator_id" id="operator_id" value="<?php echo $operator_id ?>" /?"></p>
        </div>
                    
                    
              </form>

        </div>


                </h3>
              </div>
              
            </div>
            <br>
          </div>
      @include('operator.partials.footer')
</body>

</html>