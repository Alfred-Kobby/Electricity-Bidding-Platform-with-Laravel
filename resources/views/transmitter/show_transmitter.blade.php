<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Transmitter Dashboard
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

  @include('transmitter.partials.navbar')


      <div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
               <h2>Market Rules</h2>
               <hr>
               @if (count($rules)>0)
              @foreach ($rules as $rule)
                  <div class="well">
                  <h3>{{$rule->title}}</h3>
                  
                  <h5>{{$rule->description}}</h5>
                  </div>  
              @endforeach
          @else
              {{ "No Rule found" }}
          @endif
               
              

                    
      

                </h3>
              </div>
    
            </div>
          </div>
        </div>
      
      

      @include('bid.partials.footer')
</body>

</html>