<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin-dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin-settings')}}" class="nav-link">Settings</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="user-panel">
              <img src="{{ asset('storage/admin_image') }}/{{Auth::guard('admin')->User()->image}}" class="img-circle elevation-2" alt="User Image">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth::guard('admin')->User()->name}}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-key mr-2"></i>Update Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i>Update Details
          </a>
          {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> --}}
          <div class="dropdown-divider"></div>
          <a href="{{route('admin-logout')}}" class="dropdown-item dropdown-footer btn btn-secondary">Logout</a>
        </div>
      </li>
      <!-- Navbar Search -->
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin-logout')}}" class="nav-link">logout&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
      </li> --}}
    </ul>
  </nav>