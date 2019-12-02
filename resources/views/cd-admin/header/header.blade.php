<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-ellipsis-v"></i><i class="fas fa-ellipsis-v"></i><i class="fas fa-ellipsis-v"></i></a>
      </li>
    </ul>

    

    <ul class="navbar-nav ml-auto">
    </ul>
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
                  <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link"> 
      <img src="{{url('public/cd-admin/logo/dslogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Deuda Samaj</b></span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="{{url('/viewadmin')}}" class="nav-link">
              <i class="nav-icon fas fa-user-shield text-danger"></i>
              <p class="text">Admin</p>
            </a>
          </li>
          
          <li class="nav-header">DASHBOARD</li>
          <li class=" nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
           <li class="nav-header">BANNER</li>
          <li class="nav-item">
            <a href="{{url('/banner')}}" class="nav-link">
              <i class="nav-icon fas fa-flag text-primary"></i>
              <p class="text">Banner</p>
            </a>
          </li>
          <li class="nav-header">ABOUT</li>
          <li class="nav-item">
            <a href="{{url('/abouts')}}" class="nav-link">
              <i class="nav-icon fa fa-info-circle text-secondary"></i>
              <p class="text">About</p>
            </a>
          </li>
          <li class="nav-header">GALLERY</li>
          <li class="nav-item">
            <a href="{{url('/galleries')}}" class="nav-link">
              <i class="nav-icon fas fa-image text-warning"></i>
              <p class="text">Gallery</p>
            </a>
          </li>
          <li class="nav-header">CONTACTS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book text-success"></i>
              <p>
                Contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/contacts')}}" class="nav-link">
                  <i class="fas fa-envelope nav-icon text-primary"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/viewcontactdetail')}}" class="nav-link">
                  <i class="fas fa-address-card nav-icon text-danger"></i>
                  <p>Contact Detail</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-header">SEO SECTION</li>
          <li class="nav-item">
            <a href="{{url('/viewseo')}}" class="nav-link">
              <i class="nav-icon fas fa-search text-danger"></i>
              <p class="text">Seo</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>