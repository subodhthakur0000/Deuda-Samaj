@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Gallery</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/galleries')}}">Gallery</a></li>
          <li class="breadcrumb-item active"><a href="{{url()->current()}}">Add Image</a></li>
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
        <h3 class="card-title">Add Image</h3>
      </div>
      <div class="card-body">
        <form role="form" action="{{url('/storegallery')}}" method="POST" enctype="multipart/form-data" id="the-form">
          @csrf

          <div class="form-group">
            <label >Image Title</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
              </div>
              <input type="text" class="form-control" id="" placeholder="Enter Image Title" name="title" value="{{old('title')}}">
              <div class="text text-danger">{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
              <label >Gallery Image Upload</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" id=""><i class="fas fa-cloud-upload-alt text-warning" aria-hidden="true"></i></span>
                </div>
                <input type="file" id="exampleInputFile" name="image" value="{{old('image')}}"required>
                <div class="text text-justify">{{$errors->first('image')}}</div>
              </div>
            </div>
            <div class="form-group">
              <label >Gallery Image Description</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
                </div>
                <input type="text" class="form-control" id="" placeholder="Enter Gallery Image Description" name="imagedescription" value="{{old('imagedescription')}}"required>
                <div class="text text-justify">{{$errors->first('imagedescription')}}</div>
              </div>
            </div>

            <div class="form-group">
              <label >Status</label>
              <div class="form-group clearfix">
                <div class="icheck-success d-inline">
                  <input type="radio" name="status"  id="radioSuccess1" value="Active">
                  <label for="radioSuccess1">Active</label>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="icheck-success d-inline">
                  <input type="radio" name="status" id="radioSuccess2" value="Inactive">
                  <label for="radioSuccess2">Inactive</label>
                </div>
                <div class="text text-danger">{{ $errors->first('status') }}</div>
              </div>
            </div>

            <button type="submit" class="btn btn-info" style="float: left">Add Image</button> 
          </form>
          <a href="{{url()->previous()}}"><button type="button" class="btn btn-default" style="float: right">Cancel</button></a>


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