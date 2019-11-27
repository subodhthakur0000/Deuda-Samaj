@extends('cd-admin.admin')
@section('content')
<section class="content-header">
	<h1>
		Banner
		<small>Details</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/dashboard')}}"><i class="fa fa-file-photo-o"></i> Home</a></li>
		<li class="active"><a href="{{url('/banner')}}">Banner</a></li>
		<li class="active"><a href="{{url()->current()}}">Add-Banner</a></li>
	</ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-md-12">
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Banner Details</h3>
      </div>
      <div class="box-body">
        
      <form role="form" action="{{url('/s')}}" method="POST" enctype="multipart/form-data" id="the-form">
        @csrf
        <div class="form-group">
                <label for="exampleInputPassword1"> Banner Title</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-align-justify"></i>
                  </div>
                  <input type="text" class="form-control" id="" placeholder="Enter Banner Title" name="title" value="{{old('title')}}">
                  <div class="text text-justify">{{$errors->first('title')}}</div>
                </div>
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Image Upload</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fas fa-cloud-upload-alt"></i>
                  </div>
                  <input type="file" id="exampleInputFile" name="image" value="{{old('image')}}">
                  <div class="text text-justify">{{$errors->first('title')}}</div>
                </div>
          </div>
          <div class="form-group">
                    <label >Upload Advertisement </label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span class="input-group-text" id=""><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i></span>
                      </div>
                    <input type="file" name="image" value="{{old('image')}}">
                    <div class="text text-danger">{{ $errors->first('image') }}</div>
                  </div>
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