 <!-- operator  -->

@if (count($Operator)>0)
              @foreach ($Operator as $operator)
               @endforeach
          @else
              <p> No Operator Found </p>
          @endif

<!-- ProducerModal-->
 <div class="modal modal-search fade" id="ProducerModal" tabindex="-1" role="dialog" aria-labelledby="ProducerModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Power Producers"></h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
             <div class="modal-body">
               @if (count($powerProducer)>0)
              @foreach ($powerProducer as $power)
                  <div class="well">
                  <h3><a href="{{url('/producer/edit/' .$power->producer_id)}}" >{{$power->organisation_name}}</a><a href="" data-target="#alert" data-toggle="modal" onclick="emc('{{$power->producer_id}}')"><i class="tim-icons icon-trash-simple pull-right"></i></a></h3>
                  </div>  
              @endforeach
          @else
              <p> No Power Producers Found </p>
          @endif
          
        </div>
          </div>
        </div>
      </div>
    
  <!-- End Producer Modal-->

  

  <!-- BulkCustomemrModal-->
    <div class="modal modal-search fade" id="CustomerModal" tabindex="-1" role="dialog" aria-labelledby="CustomerModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Bulk Customers"></h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
             <div class="modal-body">
               @if (count($bulkCustomer)>0)
              @foreach ($bulkCustomer as $customer)
                  <div class="well">
                  <h3><a href="{{url('/bulkcustomer/edit/' .$customer->customer_id)}}" >{{$customer->organisation_name}}</a><a href="" data-target="#alert1" data-toggle="modal" onclick="emcl('{{$customer->customer_id}}')"><i class="tim-icons icon-trash-simple pull-right"></i></a></h3>
                  </div>  
              @endforeach
          @else
              <p> No Bulk Customer Found </p>
          @endif
          
        </div>
          </div>
        </div>
      </div>
  <!-- End BulkCustomemr Modal-->

  <!-- Transmitter Modal-->
    <div class="modal modal-search fade" id="TransmitterModal" tabindex="-1" role="dialog" aria-labelledby="TransmitterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1><input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Power Transmitters"></h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
             <div class="modal-body">
               @if (count($transmitter)>0)
              @foreach ($transmitter as $transmitters)
                  <div class="well">
                  <h3><a href="{{url('/transmitter/edit/' .$transmitters->transmitter_id)}}" >{{$transmitters->transmitter_name}}</a><a href="" data-target="#alert1" data-toggle="modal" onclick="emc2('{{$transmitters->transmitter_id}}')"><i class="tim-icons icon-trash-simple pull-right"></i></a></h3>
                  </div>  
              @endforeach
          @else
              <p> No Transmitter Found </p>
          @endif
          
        </div>
          </div>
        </div>
      </div>
  <!-- End Transmitter Modal-->

  <!-- Alert Modal 1-->
  <div class="modal fade" id="alert" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Delete Producer Record</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Do you want to delete record?</p>
            <div class="form-group">
              
                <div class="form-group has-feedback">
                  
                <div class="row">
                  <div class="col-sm-6">
                    <button type="submit" value="Yes" name="yes" class="btn btn-info btn-block btn-flat" onclick="test()">Yes</button>
                    </div>

                    <div class="col-sm-6">
                    <button type="submit" value="Login" name="login" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                    </div>
          
                  </div>
          
          
                  
                  
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->

  <!-- Alert Modal 2-->
  <div class="modal fade" id="alert1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Delete Customer Record</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Do you want to delete record?</p>
            <div class="form-group">
              
                <div class="form-group has-feedback">
                  
                <div class="row">
                  <div class="col-sm-6">
                    <button type="submit" value="Yes" name="yes" class="btn btn-info btn-block btn-flat" onclick="test1()">Yes</button>
                    </div>

                    <div class="col-sm-6">
                    <button type="submit" value="Login" name="login" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                    </div>
          
                  </div> 
                  
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->

  <!-- Alert Modal 3-->
  <div class="modal fade" id="alert2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Delete Power Transmitter Record</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Do you want to delete record?</p>
            <div class="form-group">
              
                <div class="form-group has-feedback">
                  
                <div class="row">
                  <div class="col-sm-6">
                    <button type="submit" value="Yes" name="yes" class="btn btn-info btn-block btn-flat" onclick="test2()">Yes</button>
                    </div>

                    <div class="col-sm-6">
                    <button type="submit" value="Login" name="login" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                    </div>
          
                  </div> 
                  
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->

  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a  class="simple-text logo-mini">
            
          </a>
          <a href="/operator" class="simple-text logo-normal">
           Dashboard

          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="/producer/create">
              <i class="tim-icons icon-single-02"></i>
              <p>Add new Producer</p>
            </a>
          </li>
          <li>
            <a  data-toggle="modal" data-target="#ProducerModal">
              <i class="tim-icons icon-notes"></i>
              <p>View Producers </p>
           </a>
          </li>
          <li>
            <a href="/bulkcustomer/create">
              <i class="tim-icons icon-single-02"></i>
              <p>Add New Bulk Customer</p>
            </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#CustomerModal">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>View Bulk Customer</p>
            </a>
          </li>
          <li>
            <a href="/transmitter/create">
              <i class="tim-icons icon-single-02"></i>
              <p>Add New Transmitter</p>
            </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#TransmitterModal">
              <i class="tim-icons icon-notes"></i>
              <p>View Transmitters</p>
            </a>
          </li>
           <li>
            <a href="/operator/create">
              <i class="tim-icons icon-single-02"></i>
              <p>New Market Operator</p>
            </a>
          </li>
          <li>
            <a href="/market_rules/create">
              <i class="tim-icons icon-istanbul"></i>
              <p>Market Rules</p>
            </a>
          </li>
          <li>
            <a href="/optimizer/create">
              <i class="tim-icons icon-email-85"></i>
              <p>Optimizer</p>
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
            <a class="navbar-brand" href="javascript:void(0)">{{ $user_log_name }}</a>
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
                    <a href="{{url('/operator/message/show/' .$messages->message_id)}}" class="nav-item dropdown-item">
                     
                      {{ $messages->message_title }}
                
                    </a>
                  </li>
                  @endforeach
                  
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
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
                    <a href="{{url('/operator/edit/' .$operator->operator_id)}}" class="nav-item dropdown-item">Profile</a>
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
  <!-- Modal box -->

      <!-- Modal -->
      <div id="producerModal" class="modal">
        <div class="modal-content">
          <span class="closeBtn">&timise;</span>
          <p>This is where the modal will be</p>
        </div>
      </div>
      <!--EndModal-->

      
