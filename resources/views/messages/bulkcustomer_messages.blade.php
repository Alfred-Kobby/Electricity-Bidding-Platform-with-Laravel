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

  @include('bulkcustomer.partials.navbar')


      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

              <br><br>
              <center>
               <h2>Messages</h2>
               </center>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">
                <center>
                  <div class="panel-heading">Inbox</div>
                </center>
                

                <div class="panel-body">
                <hr>

                <!-- From -->
                <label for="title"><h4>Message From : </h4></label>
                <label for="title"><h4>{{ $data['message']->from }}</h4></label>
                <br>

                <!-- User type -->
                <label for="title"><h4>User Type : </h4></label>
                <label for="title"><h4>{{ $data['message']->user_type }}</h4></label>
                <br>

                <!-- Organization -->
                <label for="title"><h4>Organization : </h4></label>
                <label for="title"><h4>{{ $data['message']->organization }}</h4></label>
                <br>
                

                <!-- Message Title -->
                <label for="title"><h4>Message Title : </h4></label>
                <label for="title"><h4>{{ $data['message']->message_title }}</h4></label>
                <br>



                <!-- Message -->
                <label for="title"><h4>Message Text : </h4></label>
                <label for="title"><h4>{{ $data['message']->message }}</h4></label>
                <br>
                <hr>
              
        </div>
                   

        </div>
           <a class="btn btn-primary" data-target="#login" data-toggle="modal">
              <i><p>Reply Message</p></i> 
            </a>
            <hr>
        <br><br>


                </h3>
             
              </div>
              
            </div>
          </div>

      @include('bid.partials.footer')
</body>

</html>