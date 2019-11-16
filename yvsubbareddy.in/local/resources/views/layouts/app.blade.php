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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Namo Venkatesaaya Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL('/')}}/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL('/')}}/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{URL('/')}}/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL('/')}}/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{URL('/')}}/assets/dist/css/skins/_all-skins.min.css">
   <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL('/')}}/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <style>
      .main-sidebar{
          position:fixed;
      }
  </style>
  <script src="{{URL('/')}}/assets/js/jquery.min.js"></script>
        <script src="{{URL('/')}}/assets/js/popper.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Namo Venkatesaaya</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/')}}/assets/dist/img/default-50x50.gif" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Auth::user()->name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-body">
                <img src="{{url('/')}}/assets/dist/img/default-50x50.gif" class="img-circle" alt="User Image">
                <p>
                 <?php echo Auth::user()->name;?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              
<!--start-->
  <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="{{route('user.change_password')}}">Change Password</a>
                  </div>
                 
                </div></li>
        
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="{{route('user.profile')}}">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/assets/dist/img/default-50x50.gif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@if(Auth::check())
                    <a href="#" class="simple-text logo-normal">
                      {{ Auth::user()->name }}
                    </a>
                    @endif</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active treeview menu-open">
          <a href="dashboard.html">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
       <li class= "{{ request()->is('/home') ? 'active' : '' }} " >
      <a href="{{route('home')}}">
                        <i class="fa fa-fw fa-home"></i>            
                           <span>Home</span>
               <span class="pull-right-container">
                           <!-- <i class="fa fa-angle-left pull-right"></i></span> -->
                       </a>
                      </li>
             @if(Auth::user()->user_type == 3)
             <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>REPORTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">     
               <li class= "{{request()->is('staff/pending') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'pending')}}">
                        <i class="fas fa-rupee-sign"></i>           
                           <span>Pending List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/aprove') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'aprove')}}">
                        <i class="fas fa-chalkboard-teacher"></i>           
                           <span>Aproved List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/reject') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'reject')}}">
                        <i class="fas fa-users"></i>            
                           <span>Reject List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/confirm') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'confirm')}}">
                        <i class="fas fa-users"></i>            
                           <span>Confirm List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/all') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'all')}}">
                        <i class="fas fa-phone"></i>            
                           <span>All List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                  
          </ul>
        </li>    
       
             @endif
             
            @if(Auth::user()->user_type != 3)
                      @if(Auth::user()->user_type==1 ||Auth::user()->user_type==2)
                      
                       <li class= "{{ request()->is('/calender') ? 'active' : '' }} " >
      <a href="{{route('user.calender')}}">
                        <i class="fa fa-calendar"></i>            
                           <span>Calendar</span>
               <span class="pull-right-container">
                          <!-- <i class="fa fa-angle-left pull-right"></i></span>-->
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
                           <li class= "{{ request()->is('staff/aprove') ? 'active' : '' }} " >
                       <a href="{{route('visitor.staffstatus', 'aprove')}}">
                        <i class="fas fa-chalkboard-teacher"></i>           
                           <span>Aproved List</span>
               <span class="pull-right-container">
                           <!--<i class="fa fa-angle-left pull-right"></i></span>-->
                       </a>
                      </li>
               <li class= "{{ request()->is('staff/confirm') ? 'active' : '' }} " >
      <a href="{{route('visitor.staffstatus', 'confirm')}}">
                        <i class="fas fa-users"></i>            
                           <span>Confirm List</span>
               <span class="pull-right-container">
                          <!-- <i class="fa fa-angle-left pull-right"></i></span>-->
                       </a>
                      </li>
                    @else
<li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>REPORTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">     
            <!--pending list-->
             <li class= "{{request()->is('/homelist') ? 'active' : '' }} " >
      <a href="{{route('homelist')}}">
                        <i class="fa fa-fw fa-home"></i>            
                           <span>HOME LIST</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
            <!--pending-->
               <li class= "{{request()->is('staff/pending') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'pending')}}">
                        <i class="fas fa-rupee-sign"></i>           
                           <span>Pending List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/aprove') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'aprove')}}">
                        <i class="fas fa-chalkboard-teacher"></i>           
                           <span>Aproved List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/reject') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'reject')}}">
                        <i class="fas fa-users"></i>            
                           <span>Reject List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/confirm') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'confirm')}}">
                        <i class="fas fa-users"></i>            
                           <span>Confirm List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                         <li class= "{{ request()->is('visitor/all') ? 'active' : '' }} " >
      <a href="{{route('visitor.status', 'all')}}">
                        <i class="fas fa-phone"></i>            
                           <span>All List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                  
          </ul>
        </li>    
       
    
    @if(isset(Auth::user()->user_type) && Auth::user()->user_type != '1'&&Auth::user()->user_type != '2')
 
 <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>SETTINGS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">     

 @if(isset(Auth::user()->id) && Auth::user()->user_type == 'admin')

                         <li class= "{{ request()->is('users/index') ? 'active' : '' }} " >
      <a href="{{route('user.index')}}">
                        <i class="fas fa-users"></i>            
                           <span>Office Staff</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                      
                        <li class= "{{ request()->is('user/list') ? 'active' : '' }} " >
      <a href="{{route('user.list')}}">
                        <i class="fas fa-users"></i>            
                           <span>MP/MLA's</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                      @endif

   <li class= "{{ request()->is('users/addmessage') ? 'active' : '' }} " >
      <a href="{{route('users.addmessage')}}">
                        <i class="fa fa-envelope"></i>            
                           <span>Add Message</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>           
                     
               <li class= "{{ request()->is('users/addslides') ? 'active' : '' }} " >
      <a href="{{route('users.addslides')}}">
                        <i class="fas fa-camera"></i>           
                           <span>Add Slides</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>

 </li>
</ul>

<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>USER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">     
                 @if(isset(Auth::user()->user_type) && Auth::user()->user_type != '1'&&Auth::user()->user_type != '2')
   <li class= "{{ request()->is('add_registration') ? 'active' : '' }} " >
      <a href="{{route('add_registration')}}">
                        <i class="fas fa-users"></i>            
                           <span>Add Registration</span>
               <span class="pull-right-container">
                           <!-- <i class="fa fa-angle-left pull-right"></i></span> -->
                       </a>
                      </li>           
                         <li class= "{{ request()->is('users/adduser') ? 'active' : '' }} " >
      <a href="{{route('users.adduser')}}">
                        <i class="fas fa-users"></i>            
                           <span>Add User</span>
               <span class="pull-right-container">
                          <!--  <i class="fa fa-angle-left pull-right"></i> --></span>
                       </a>
                      </li>
 @endif
                         <li class= "{{ request()->is('users/referurl') ? 'active' : '' }} " >
      <a href="{{route('user.referurl')}}">
                        <i class="fas fa-user-plus"></i>            
                           <span>Refer Url</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
</ul>
</li>                      
<li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>Statistics</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">     
          
               <li class= "{{ request()->is('/stastics') ? 'active' : '' }} " >
      <a href="{{route('visitor.stastics')}}">
                        <i class="fas fa-chart-line"></i>           
                           <span>Statistics</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>

              </ul>
              </li>
                      @endif
                      @endif
                       <?php 
                        if(in_array(1,$responses)){?>
                       treeview" >
      <a href="{{route('visitor.status', 'pending')">
                        <i class="fas fa-rupee-sign"></i>           
                           <span>Pending List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                    <?php } 
                      if(in_array(2,$responses)){?>
                            <li class= "{{ request()->is('visitor/reject') ? 'active' : '' }}" >
      <a href="{{route('visitor.status', 'reject')}}">
                        <i class="fas fa-users"></i>            
                           <span>Reject List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                        <?php }     if(in_array(3,$responses)){?>
                         <li class= "{{ request()->is('visitor/all') ? 'active' : '' }} treeview" >
      <a href="{{route('visitor.status', 'all')}}">
                        <i class="fas fa-phone"></i>            
                           <span>All List</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                        <?php } 
                        if(in_array(4,$responses)){?>
                          <li class= "{{ request()->is('add_registration') ? 'active' : '' }}" >
      <a href="{{route('add_registration')}}">
                        <i class="fas fa-users"></i>            
                           <span>Add Registration</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>   
                       
                        <?php } 
                        if(in_array(6,$responses)){?>
                        <li class= "{{ request()->is('users/addslides') ? 'active' : '' }}" >
      <a href="{{route('users.addslides')}}">
                        <i class="fas fa-camera"></i>           
                           <span>Add Slides</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                        <?php }  if(in_array(7,$responses)){?>
                       <li class= "{{ request()->is('users/addmessage') ? 'active' : '' }}" >
      <a href="{{route('users.addmessage')}}">
                        <i class="fa fa-envelope"></i>            
                           <span>Add Message</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>   
                        <?php } if(in_array(8,$responses)){?>
                          <li class= "{{ request()->is('users/addslides') ? 'active' : '' }}" >
      <a href="{{route('users.addslides')}}">
                        <i class="fas fa-camera"></i>           
                           <span>Add Slides</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
                       </a>
                      </li>
                        <?php }   if(in_array(9,$responses)){?>
                        <li class= "{{ request()->is('users/referurl') ? 'active' : '' }}" >
      <a href="{{route('user.referurl')}}">
                        <i class="fas fa-user-plus"></i>            
                           <span>Refer Url</span>
               <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i></span>
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
   </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <!--   <section class="content-header">
      <h1>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-body">
@yield('content')           
       </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="#">YV SUBBAREDDY</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="{{URL('/')}}/assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="{{URL('/')}}/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{URL('/')}}/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{URL('/')}}/assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{URL('/')}}/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- SlimScroll -->
<script src="{{URL('/')}}/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{URL('/')}}/assets/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL('/')}}/assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL('/')}}/assets/dist/js/demo.js"></script>
</body>
</html>
 <script>
        $(document).ready(function(){ 
              
	          
              $("#subdarshanam").prop("disabled",true);
              
               if($("#darshan_type").val()!==""){
               var id = $("#darshan_type").val(); 
	           if(id=="ARJITHA SEAVAS") $("#subdarshanam").prop("disabled",false);
               }
               
              $(document).on('change','#darshan_type',function(){
                var val = $(this).val(); 
                if(val==="ARJITHA SEAVAS"){
                        $("#subdarshanam").prop("disabled",false);
                      }else{
                        $("#subdarshanam").val(""); 
                        $("#subdarshanam").prop("disabled",true);
                      }
                                    });

        });

      </script>