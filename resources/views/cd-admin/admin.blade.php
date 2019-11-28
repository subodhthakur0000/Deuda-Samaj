<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Deuda Samaj| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/Ionicons/css/ionicons.min.css')}}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/cd-admin/creatu/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/gallery.css')}}">
   <!--summernote-->


  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- sweetalert -->
<link rel="stylesheet" href="{{asset('/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

  <style>
        .img1 {
             border-radius: 50%;
             height: 70px;
             width:70px;
            }
          .table_center td,th{
            align-items:  center;
            text-align: center;
          }

        .bannerimage1{
          height: 200px;
        width: 600px;
        }
      
    </style>  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Deuda</b>Samaj</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('public/uploads/'.Auth::user()->image) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('public/uploads/'.Auth::user()->image) }}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->email}}
                  <small>{{Auth::user()->role}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Log out</a>
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
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Admin</li>
        <li>
          <a href="{{ url('/viewadmin') }}">
            <i class="fa fa-user"></i> <span>Admin</span>
          </a>
        </li>
      </ul>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DASHBOARD</li>
        <li>
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      </ul>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BANNER</li>

          <li>
            <a href="{{url('/banner')}}">
              <i class="fa fa-file-photo-o"></i>
              <span>Banner</span></a>
            </li>
        </ul>

       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ABOUT</li>
          <li>
            <a href="{{url('/abouts')}}">
              <i class="fa fa-info-circle"></i>
              <span>About</span></a>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Gallery</li>
          <li>
            <a href="{{url('/galleries')}}">
              <i class="fa fa-file-photo-o"></i>
              <span>Gallery</span></a>
            </li>
        </ul>


        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">CONTACTS</li>
            <li class="treeview">
              <a href="{{url('/abouts')}}">
                <i class="fa fa-phone"></i> <span>Contacts</span>
                <span class="pull-right-container">
                </span>
                <?php
                       $count_not_replied = App\Contact::where('status','Not Replied')->count();
                ?>
            <small class="label pull-right bg-yellow">{{$count_not_replied}}</small>
              </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/contacts')}}"><i class="fa fa-circle-o"></i> Contacts</a></li>
              <li><a href="{{url('/viewcontactdetail')}}"><i class="fa fa-circle-o"></i> Contact Detail</a></li>
            </ul>
        </li>
      </ul>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">SEO SECTION</li>
        <li>
          <a href="{{ url('/viewseo') }}">
            <i class="fa fa-search"></i> <span>SEO</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">Creatu Developers</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/cd-admin/creatu/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('public/cd-admin/creatu/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('public/cd-admin/creatu/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/cd-admin/creatu/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/cd-admin/creatu/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('public/cd-admin/creatu/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/cd-admin/creatu/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script>
       @if(Session::has('success'))
           const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })

          Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}'
          })
       @elseif(Session::has('error'))
         const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })

          Toast.fire({
            icon: 'error',
            title: '{{ Session::get('error') }}'
          })
      @endif


</script>


<!-- Select2 -->
<script src="{{asset('public/cd-admin/creatu/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('public/cd-admin/creatu/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('public/cd-admin/creatu/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('public/cd-admin/creatu/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/cd-admin/creatu/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('public/cd-admin/creatu/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('public/cd-admin/creatu/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{asset('public/cd-admin/creatu/plugins/iCheck/icheck.min.js')}}"></script>

<!--summerNote-->



<script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script>
      $(document).ready(function() {
      $('.summernote').summernote();

        });
    </script>
    <script>
      $(document).ready(function() {
      $('#summernote').summernote();

        });
    </script>
    <script>
      var count = '1000';
      $(document).ready(function(){
        for($i = 0; $i < count; $i++)
        {
          $('#summernote'+$i).summernote();
        }
      });
    </script>
    </script>

<!-- datatable script-->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    }) 
  })
</script>

<!-- Sweet alert -->

 <!-- sweet notification -->
<!-- -->
<!-- Slimscroll -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/cd-admin/creatu/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/cd-admin/creatu/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/cd-admin/creatu/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/cd-admin/creatu/dist/js/demo.js') }}"></script>


  
</script>
<script type="text/javascript">
  //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>  
</body>
</html>
