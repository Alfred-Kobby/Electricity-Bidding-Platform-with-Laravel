<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','PROJECT')}}</title>
       <!--<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">-->
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/bootstrap.min.css')}}">
       <!--<link rel="stylesheet" type="text/css" href="{{asset('css/css/styles.css')}}">-->
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/mystyles.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/font-awesome.min.css')}}">
       <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/css/prettyPhoto.css')}}"> -->
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/animate.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/main.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/responsive.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/bootstrap.min.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/css/bootstrap.min.css')}}">

    <!-- styles -->
        <style>
        body {background-color:white !important;}
        .navbar li a, .navbar .navbar-brand { 
      color: white !important;
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