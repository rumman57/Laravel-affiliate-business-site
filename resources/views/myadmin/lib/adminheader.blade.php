<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/flat/blue.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/morris/morris.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css')}}" />
   @yield('header_js')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dash</b> Board</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('user.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-heartbeat"></i></a>
                 <ul class="dropdown-menu">
                
                <!-- Menu Footer-->
                <li class="user-footer" >
                  
                    <a style="background: #09728e; border: 1px solid #09728e; color: #fff;" href="{{route('user.logout')}}" class="btn btn-default btn-block">Sign out</a>
                  
                </li>
              </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>