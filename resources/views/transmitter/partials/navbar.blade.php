<div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
         <div class="logo">
          <a  class="simple-text logo-mini">
            
          </a>
          <a href="j/transmitter" class="simple-text logo-normal">
            Dashboard

          </a>
        </div>
         <ul class="nav">
          <li>
            <a href="/transmitter/show_transmitter">
              <i class="tim-icons icon-istanbul"></i>
              <p>Market Rules</p>
            </a>
          </li>
          <li>
            <a data-target="#login" data-toggle="modal">
              <i class="tim-icons icon-email-85"></i>
              <p>Send Message</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">{{ $user_log_name1 }}</a>
            <a class="navbar-brand" href="javascript:void(0)">{{ $user_log_name2}}</a>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
    
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"><span class="badge badge-danger">{{ $count }}</span></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>

                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                 @foreach ($message as $messages)
                  <li class="nav-link">
                    <a href="{{url('/messages/transmitter_messages/show/' .$messages->message_id)}}" class="nav-item dropdown-item">
                     
                      {{ $messages->message_title }}
                
                    </a>
                  </li>
                  @endforeach
                  
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="{{url('/transmitter_user/user_edit/' .$user_edit)}}" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="/logout" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->

      <!--Modal box-->
  <div class="modal modal-search fade" id="login" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" >
    <div class="modal-dialog modal-lg">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Message</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <div class="form-group">
              {!!Form::open(['action'=>'MessagesController@operator_store','method'=>'POST'])!!}
              {{ csrf_field() }}

              <!-- from -->
              <div class="form-group has-feedback">
                  <input class="form-control" name = "from" placeholder="From" id="from" type="text"  required/>
                
                </div>

                <!-- to -->
                <div class="form-group has-feedback">
                  <input class="form-control" name = "to" placeholder="To" id="to" type="text"  required/>
                
                </div>

                <!-- user_type -->
                <div class="form-group has-feedback">
                  <input class="form-control" name = "user_type" placeholder="User Type(eg : Producer)" id="user_type" type="text"  required/>
      
                </div>

                <!-- organization -->
                <div class="form-group has-feedback">
                  <input class="form-control" name = "organization" placeholder="Organization" id="organization" type="text"  required/>
      
                </div>
                
                <!-- title -->
                <div class="form-group has-feedback">
                  <input class="form-control" name = "message_title" placeholder="Title" id="message_title" type="text"  required/>
      
                </div>

                <!-- text -->
                <div class="form-group has-feedback">
                  <input class="form-control" name = "message" placeholder="Message" id="message_title" type="text"  required/> 
       
                </div>
                <div class="row">
                 
         
                  <div class="col-xs-12">
                    <button type="submit" value="send" name="send" class="btn btn-primary btn-block btn-flat pull-right">Send</button>
                  </div>
                </div>
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->