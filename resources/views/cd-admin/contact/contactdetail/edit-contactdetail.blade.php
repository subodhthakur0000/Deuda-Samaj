@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/contacts')}}">Contact</a></li>
          <li class="breadcrumb-item active"><a href="{{url('/viewcontactdetail')}}">Contact Detail</a></li>
          <li class="breadcrumb-item active"><a href="{{url()->current()}}">Edit Contact Detail</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row"> 
		<div class="col-12">
     <!-- Input addon -->
     <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Contact Details</h3>
      </div>
      <div class="card-body">
        <form role="form" action="{{url('/updatecontactdetail/'.$contactdetail->id)}}" method="POST" enctype="multipart/form-data" id="the-form">
          @csrf

          <div class="form-group">
            <label >Email</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope text-success"></i></span>
              </div>
              <input type="email" required class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" value="{{$contactdetail->email}}" >
            <div class="text text-danger">{{ $errors->first('email') }}</div>
            </div>
            <div class="form-group">
              <label >Phone</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone text-success"></i></span>
                </div>
                <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Phone Number" value="{{$contactdetail->phone}}" >
            <div class="text text-danger">{{ $errors->first('phone') }}</div>
              </div>
            </div>
            <div class="form-group">
              <label >Address</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-home text-success"></i></span>
                </div>
                <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Enter Address" value="{{$contactdetail->address}}" >
            <div class="text text-danger">{{ $errors->first('address') }}</div>
              </div>
            </div>

            <button type="submit" class="btn btn-info" style="float: left">Update Contact Detail</button> 
          </form>
          <a href="{{url()->previous()}"><button type="button" class="btn btn-default" style="float: right">Cancel</button></a>


        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


@endsection