@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8 offset-md-2">
              {{-- <div class="col-md-12 mt-3 mb-3">
                @if (\Session::has('success'))   
                  <p class="alert alert-success">{{ \Session::get('success') }}</p>    
                @endif
              </div> --}}
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Admin Details</h3>
                </div>
                <!-- /.card-header -->
                @if (\Session::has('success'))   
                  <p class="alert alert-success mt-3">{{ \Session::get('success') }}</p>    
                @endif
                <!-- form start -->
                <form method="post" action="{{ route('update-admin-details') }}" id="update_admin_details_form" name="update_admin_details_form" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" value="{{Auth::guard('admin')->User()->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="admin_type">Admin Type</label>
                        <input type="text" class="form-control" value="{{Auth::guard('admin')->User()->type}}" readonly>
                      </div>
                    <div class="form-group">
                      <label for="admin_name">Name</label>
                      <input type="text" class="form-control" id="admin_name"  name="admin_name" value="{{Auth::guard('admin')->User()->name}}" placeholder="Enter Admin Name">
                    </div>
                    <div class="form-group">
                        <label for="admin_mobile">Mobile</label>
                        <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" value="{{Auth::guard('admin')->User()->mobile}}" placeholder="Enter Admin Mobile">
                    </div>
                    <div class="form-group">
                        <label for="admin_image">Image</label>
                        <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*">
                        @if(!empty(Auth::guard('admin')->User()->image))
                            <div class="mt-1"><p><a href="{{ asset('storage/admin_image') }}/{{Auth::guard('admin')->User()->image}}" target="_blank">View Iamge</a></p></div>
                            <input type="hidden" class="form-control" id="current_admin_image" name="current_admin_image" value="{{Auth::guard('admin')->User()->image}}">
                        @endif
                    </div>
                    {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->

</div>
@endsection