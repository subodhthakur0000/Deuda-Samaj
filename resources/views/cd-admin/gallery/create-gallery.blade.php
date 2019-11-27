@extends('cd-admin.admin')
@section('content')
<section class="content-header">
	<h1>
		Gallery
		<small>Details</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/dashboard')}}"><i class="fa fa-file-photo-o"></i> Home</a></li>
		<li class="active"><a href="{{url('/gallery')}}">Gallery</a></li>
		<li class="active"><a href="{{url()->current()}}">Add-Image</a></li>
	</ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-md-12">
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Image Details</h3>
      </div>
      <div class="box-body">
      <form role="form" action="{{url('/storegallery')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="exampleInputPassword1"> Image Title</label>
            <input type="text" class="form-control" id="" placeholder="Enter Album Title" name="title" value="{{old('title')}}">
            <div class="text text-danger">{{ $errors->first('title') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image Upload</label>
            <input type="file" id="exampleInputFile" name="image" value="{{old('image')}}">
            <div class="text text-danger">{{ $errors->first('image') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Image Description</label>
            <input type="text" class="form-control" id="" placeholder="Enter Alternative Image Description" name="imagedescription" value="{{old('imagedescription')}}">
            <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Status</label><br>
            <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="status" value="Inactive"> Inactive
          </div>
          <div class="modal-footer col-md-6">
            <button type="submit" class="btn btn-info pull-left">Add Image</button>  
          </div>
      </form>
      <div class="modal-footer col-md-6">
      <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default ">Back</button></a>
      </div>
      </div>
    </div>
  </div>
</div>
</section> 
@endsection