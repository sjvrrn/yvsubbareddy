<?php 
$response = \App\Responses::where(['userid' => Auth::user()->id])->get();
$responses = array();
foreach($response as $res){
  $responses[] = $res->response_id;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>YV Subba Reddy-admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{URL('/')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{URL('/')}}/assets/css/paper-dashboard.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/style.css?v=1">
        <link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/demo.css">
        <script src="{{URL('/')}}/assets/js/jquery.min.js"></script>
        <script src="{{URL('/')}}/assets/js/popper.min.js"></script>
        <script src="{{URL('/')}}/assets/js/bootstrap.min.js"></script>
        <script src="{{URL('/')}}/assets/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{URL('/')}}/assets/js/paper-dashboard.min.js?v=2.0.0"></script>
        <script src="{{URL('/')}}/assets/js/angular.js"></script>
        <script src="{{URL('/')}}/assets/js/custom.js"></script>
      </head>
    <body ng-app="adminApp" ng-controller="adminCntrl">
        <div class="wrapper">
            <div class="sidebar1">
                <div class="logo">
                    <a href="#" class="simple-text logo-mini">
                      <div class="logo-image-small">
                        <img src="../assets/images/user.jpg">
                      </div>
                    </a>
                    @if(Auth::check())
                    <a href="#" class="simple-text logo-normal">
                      {{ Auth::user()->name }}
                    </a>
                    @endif
                </div>
                <div class="sidebar1-wrapper">
                    <ul class="nav">
                    <li class= "{{ request()->is('/home') ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                          <i class="fa fa-fw fa-home"></i>
                          <p>Home</p>
                        </a>
                      </li>
                 @if(Auth::user()->user_type != 3)  
                 @if(Auth::user()->user_type==1 ||Auth::user()->user_type==2)
                      
                      <li class= "{{ request()->is('/calender') ? 'active' : '' }}">
                        <a href="{{route('user.calender')}}">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                          <p>Calender</p>
                        </a>
                      </li>
                    @endif
                    @if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'staff')
                    <!--li class= "{{ request()->is('staff/pending') ? 'active' : '' }}">
                        <a href="{{route('visitor.staffstatus', 'pending')}}">
                          <i class="fas fa-rupee-sign"></i>
                          <p>Pending List</p>
                        </a>
                      </li-->
                      <li class= "{{ request()->is('staff/aprove') ? 'active' : '' }}">
                        <a href="{{route('visitor.staffstatus', 'aprove')}}">
                          <i class="fas fa-chalkboard-teacher"></i>
                          <p>Aproved List</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('staff/confirm') ? 'active' : '' }}">
                        <a href="{{route('visitor.staffstatus', 'confirm')}}">
                          <i class="fas fa-users"></i>
                          <p>Confirm List</p>
                        </a>
                      </li>
                    @else
                      <li class= "{{ request()->is('visitor/pending') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'pending')}}">
                          <i class="fas fa-rupee-sign"></i>
                          <p>Pending List</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('visitor/aprove') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'aprove')}}">
                          <i class="fas fa-chalkboard-teacher"></i>
                          <p>Aproved List</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('visitor/reject') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'reject')}}">
                          <i class="fas fa-users"></i>
                          <p>Reject List</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('visitor/confirm') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'confirm')}}">
                          <i class="fas fa-users"></i>
                          <p>Confirm List</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('visitor/all') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'all')}}">
                          <i class="fas fa-phone"></i>
                          <p>All List</p>
                        </a>
                      </li>
                       @if(isset(Auth::user()->user_type) && Auth::user()->user_type != '1' &&Auth::user()->user_type != '2')
                       <li class= "{{ request()->is('add_registration') ? 'active' : '' }}">
                        <a href="{{route('add_registration')}}">
                          <i class="fas fa-users"></i>
                          <p>Add Registration</p>
                        </a>
                      </li>
                      
                      <li class= "{{ request()->is('users/adduser') ? 'active' : '' }}">
                        <a href="{{route('users.adduser')}}">
                          <i class="fas fa-users"></i>
                          <p>Add User</p>
                        </a>
                      </li>
                      @endif
                      @if(isset(Auth::user()->id) && Auth::user()->id == '7')
                      <li class= "{{ request()->is('users/index') ? 'active' : '' }}">
                        <a href="{{route('user.index')}}">
                          <i class="fas fa-users"></i>
                          <p>Office Staff</p>
                        </a>
                      </li>
                      @endif
                      @if(isset(Auth::user()->user_type) && Auth::user()->user_type != '1'&& Auth::user()->user_type != '2')
                       <li class= "{{ request()->is('users/addmessage') ? 'active' : '' }}">
                        <a href="{{route('users.addmessage')}}">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                          <p>Add Message</p>
                        </a>
                      </li>
                      <li class= "{{ request()->is('users/addslides') ? 'active' : '' }}">
                        <a href="{{route('users.addslides')}}">
                          <i class="fas fa-camera"></i>
                          <p>Add Slides</p>
                        </a>
                      </li>
                       <li class= "{{ request()->is('users/referurl') ? 'active' : '' }}">
                        <a href="{{route('user.referurl')}}">
                          <i class="fas fa-user-plus"></i>
                          <p>Refer Url</p>
                        </a>
                      </li>
                       <li class= "{{ request()->is('/stastics') ? 'active' : '' }}">
                          <a href="{{route('visitor.stastics')}}">
                              <i class="fas fa-chart-line"></i>
                            <p>Stastics</p>
                          </a>
                      </li>
                      @endif
                      @endif
                       <?php 
                        if(in_array(1,$responses)){?>
                          <li class= "{{ request()->is('visitor/pending') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'pending')}}">
                          <i class="fas fa-rupee-sign"></i>
                          <p>Pending List</p>
                        </a>
                      </li>
                    <?php } 
                      if(in_array(2,$responses)){?>
                           <li class= "{{ request()->is('visitor/reject') ? 'active' : '' }}">
                              <a href="{{route('visitor.status', 'reject')}}">
                                <i class="fas fa-users"></i>
                                <p>Reject List</p>
                              </a>
                            </li>
                        <?php }     if(in_array(3,$responses)){?>
                          <li class= "{{ request()->is('visitor/all') ? 'active' : '' }}">
                        <a href="{{route('visitor.status', 'all')}}">
                          <i class="fas fa-phone"></i>
                          <p>All List</p>
                        </a>
                      </li>
                        <?php } 
                        if(in_array(4,$responses)){?>
                             <li class= "{{ request()->is('add_registration') ? 'active' : '' }}">
                        <a href="{{route('add_registration')}}">
                          <i class="fas fa-users"></i>
                          <p>Add Registration</p>
                        </a>
                      </li>
                       
                        <?php } 
                        if(in_array(6,$responses)){?>
                        <li class= "{{ request()->is('users/adduser') ? 'active' : '' }}">
                        <a href="{{route('users.adduser')}}">
                          <i class="fas fa-users"></i>
                          <p>Add User</p>
                        </a>
                      </li>
                        <?php }  if(in_array(7,$responses)){?>
                        <li class= "{{ request()->is('users/addmessage') ? 'active' : '' }}">
                        <a href="{{route('users.addmessage')}}">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                          <p>Add Message</p>
                        </a>
                      </li>
                        <?php } if(in_array(8,$responses)){?>
                        <li class= "{{ request()->is('users/addslides') ? 'active' : '' }}">
                        <a href="{{route('users.addslides')}}">
                          <i class="fas fa-camera"></i>
                          <p>Add Slides</p>
                        </a>
                      </li>
                        <?php }   if(in_array(9,$responses)){?>
                        <li class= "{{ request()->is('users/referurl') ? 'active' : '' }}">
                        <a href="{{route('user.referurl')}}">
                            <i class="fas fa-user-plus"></i>
                          <p>Refer Url</p>
                        </a>
                      </li>
                        <?php }  if(in_array(10,$responses)){?>
                         <li class= "{{ request()->is('/stastics') ? 'active' : '' }}">
                          <a href="{{route('visitor.stastics')}}">
                              <i class="fas fa-chart-line"></i>
                            <p>Stastics</p>
                          </a>
                      </li>
                        <?php } if(in_array(10,$responses)){?>
                         <li class= "{{ request()->is('/stastics') ? 'active' : '' }}">
                          <a href="{{route('visitor.stastics')}}">
                              <i class="fas fa-chart-line"></i>
                            <p>Stastics</p>
                          </a>
                      </li>
                        <?php } ?>
                    @endif
                    </ul>
                </div>
            </div>
            <div class="main-panel">
              <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent bg-col m-0">
                <div class="container-fluid">
                  <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                      <button class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                      </button>
                    </div>
                    <a class="logo-title col-white" href="{{route('admin')}}">Namo Venkatesaaya</a>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <!-- <form>
                      <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="nc-icon nc-zoom-split"></i>
                          </div>
                        </div>
                      </div>
                    </form> -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link btn-magnify" href="#pablo">
                          <!-- <i class="fas fa-user"></i> -->
                          <p>
                            <span class="d-lg-none d-md-block"></span>
                          </p>
                        </a>
                      </li>
                      <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-user"></i>
                          <p>
                            <span class="d-lg-none d-md-block"></span>
                          </p>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="dropdown-item"><a  href="{{route('user.profile')}}">Profile</a></li>
                            <li class="dropdown-item"> <a  href="{{route('user.change_password')}}">Change Password</a></li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
                @yield('content')
                
            </div>
        </div>
        
    </body>
</html>

    <script>
        $(document).ready(function(){ 
            $('#myCarousel').carousel();
              $("#subdarshanam").prop("disabled",true);
              $(document).on('change','#darshan_type',function(){
                var val = $(this).val(); 
                if(val==="SPECIAL SEAVAS"){
                        $("#subdarshanam").prop("disabled",false);
                      }else{
                        $("#subdarshanam").val(""); 
                        $("#subdarshanam").prop("disabled",true);
                      }
                                    });

        });

      </script>