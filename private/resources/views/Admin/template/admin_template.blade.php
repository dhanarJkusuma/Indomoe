@if(Auth::check())
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/textext/css/textext.core.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/textext/css/textext.plugin.arrow.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/textext/css/textext.plugin.autocomplete.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/textext/css/textext.plugin.tags.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-slider/slider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/ionslider/ion.rangeSlider.css') }}">
    <!-- ion slider Nice -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/ionslider/ion.rangeSlider.skinNice.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}">
    <style>
      .sidebar-mini
      {
        padding-right: 0;
      }
      .content-inside
      {
        padding: 50px;
      }
      .prev-input {
      position: relative;
      overflow: hidden;
      margin: 0px;    
        color: #333;
        background-color: #fff;
        border-color: #ccc;    
      }
      .prev-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
      }
      .prev-input-title {
          margin-left:2px;
      }
     .crop {
          width: 200px;
          height: 150px;
          overflow: hidden;
      }

      .crop img {
          width: 400px;
          height: 300px;
          margin: -75px 0 0 -100px;
      }
      .modal {
          overflow-y:auto;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="index2.html" class="logo">
          <span class="logo-mini"><b>A</b>LT</span>
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks -->
              
              <!-- User Account -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 @if(Auth::check())
                  <img src="{{ Auth::user()->image }}" class="user-image" width="160" height="160" alt="User Image">
                 @endif
                  <span class="hidden-xs">
                    @if(Auth::check())
                          {{ Auth::user()->email }}
                    @endif
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if(Auth::check())
                    <img src="{{ Auth::user()->image }}"  class="img-circle" alt="User Image">
                    @endif
                    <p>
                    @if(Auth::check())
                       {{ Auth::user()->name }}
                    @endif
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ url('admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
            @if(Auth::check())
              <img src="{{ Auth::user()->image }}" width="160" height="160" class="img-circle" alt="User Image">
            @endif
            </div>
            <div class="pull-left info">
            @if(Auth::check())
              <p>{{ Auth::user()->name }}</p>
            @endif
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            @if(Auth::user()->hak_akses=="superadmin")
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span>User Management </span>
                  
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('admin/user/build') }}"><i class="fa fa-circle-o"></i> Register </a></li>
                  <li><a href="{{ url('admin/user/manage') }}"><i class="fa fa-circle-o"></i> User Management </a></li>
                </ul>
              </li>
            @endif
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-database"></i>
                <span>Anime </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview-menu"><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Anime</a></li>
                <li>
                  <a href="#"><i class="fa fa-desktop"></i> Anime <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('admin/anime') }}"><i class="fa fa-list-alt"></i> List Anime</a></li>
                    <li><a href="{{ url('admin/anime/add') }}"><i class="fa fa-pencil"></i> Add Anime</a></li>
                  </ul>
                </li>
               <li>
                  <a href="#"><i class="fa fa-film"></i> Episode Post <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('admin/episode') }}"><i class="fa fa-list-alt"></i> List Episode </a></li>
                    <li><a href="{{ url('admin/episode/add') }}"><i class="fa fa-pencil"></i> Add New Episode </a></li>
                  </ul>
                </li>
                 <li>
                  <a href="{{ url('admin/mostWatched') }}">
                    <i class="fa fa-star"></i> <span>Most Watched Anime</span>
                  </a>
                </li>
                <li><a href="{{ url('admin/category') }}"><i class="fa fa-tag"></i> Category Anime</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-database"></i>
                <span>Vocaloid </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Vocaloid</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-pencil"></i> Vocaloid Post</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-tag"></i> Category Music</a></li>
              </ul>
            </li> 
           
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


    <div class="content-wrapper">

        @yield('content')
        
    </div><!-- /.content-wrapper -->


     <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              
            </ul><!-- /.control-sidebar-menu -->
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
    
    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('assets/dist/js/app.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script>

         

  </body>

</html>
@endif