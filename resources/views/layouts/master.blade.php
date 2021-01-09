<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','PROJECT')}}</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <!--{{asset('css/css/mystyles.css')}}-->
  <link href="{{asset('css/asset/styles.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('css/asset/bootstrap.min.css')}}" rel="stylesheet" />
    <script src="{{asset('css/asset/jquery.min.js')}}"></script>
 

    <!-- styles -->
        <style>
        body {background-color:white !important;

              }

        .navbar li a, .navbar .navbar-brand { 
      color: white !important;
           }
           .btn {background-color: #e14eca;
                  border-color: #e14eca;
                }

        </style>

    </head>
    <body>
          
           
        <div class="container">
          
    	   @yield('content')
        </div>
    </body>
</html>
`