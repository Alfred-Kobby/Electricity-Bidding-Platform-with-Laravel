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
               <h2>Coordinator edit forms</h2>
               <hr>
                @include ('layouts.errors')
               <div class="panel panel-default">
              
                <h3 class="card-title">

                <div class="panel panel-default">
                <div class="panel-heading">Market Coordinator</div>
                <hr>

                   <div class="panel-body">
                <form method="post" action="/bulkcustomer_user{{ isset($data['user']) ? '/' . $data['user']->id . '/update' : '' }}"> 
                                {{csrf_field()}}
                            @if(isset($data['user']))
                                {{method_field('PUT')}}
                            @endif
       
                   <div class="form-row">
                    
                    <div class="form-group col-md-12">
                      <label for="password"><h4>Password</h4></label>
                      <input type="password" minlength="8" class="form-control" id="password" name="password" minlength="3" maxlength="15" value="{{isset($data['user']) ? $data['user']->password : '' }}">
                    </div>
                    <p class="invisible"><input type="text" class="form-control" id="username" name="username" value="{{isset($data['user']) ? $data['user']->username : '' }}"></p>
                  </div>
  </div>
  <hr>

            <div class="panel-footer">
             <button type="submit" class="btn btn-primary btn-fill btn-wd">Save</button>
</div>
         </div>
          </form>

                    
      

                </h3>
              </div>
    
            </div>
          </div>
          <br><br><br><br><br><br><br><br><br><br>
        </div>
      
      

      @include('bid.partials.footer')
</body>

</html>