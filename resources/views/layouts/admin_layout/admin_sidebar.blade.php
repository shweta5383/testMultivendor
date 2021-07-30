<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin-dashboard') }}" class="brand-link">
      <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Multivendor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="@if(Auth::guard('admin')->User()->image != ''){{ asset('storage/admin_image') }}/{{Auth::guard('admin')->User()->image}}@else{{ asset('images/avatar.png') }}@endif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ucwords(Auth::guard('admin')->User()->name)}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            @if(\Request::route()->getName() == 'admin-dashboard')
              @php $active = 'active';  @endphp  
            @else
              @php $active = '';  @endphp   
            @endif
            <a href="{{ route('admin-dashboard') }}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            @if(\Request::route()->getName() == 'admin-settings' || \Request::route()->getName() == 'update-admin-details')
              @php $active = 'active';  @endphp  
            @else
              @php $active = '';  @endphp   
            @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="fas fa-cog nav-icon"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Request::route()->getName() == 'admin-settings')
                  @php $active = 'active';  @endphp  
                @else
                  @php $active = '';  @endphp   
                @endif
                <a href="{{route('admin-settings')}}" class="nav-link {{ $active }}">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Update Password</p>
                </a>
              </li>
              <li class="nav-item">
                @if(\Request::route()->getName() == 'update-admin-details')
                  @php $active = 'active';  @endphp  
                @else
                  @php $active = '';  @endphp   
                @endif
                <a href="{{route('update-admin-details')}}" class="nav-link {{ $active }}">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>