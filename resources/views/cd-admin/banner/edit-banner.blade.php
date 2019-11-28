@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Banner
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-photo-o"></i> Dashboard</a></li>
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
        
      <form role="form" action="{{url('/updatebanner/'.$data->slug)}}" method="POST" enctype="multipart/form-data" id="the-form">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1"> Banner Title</label>
            <input type="text" class="form-control" id="" placeholder="Enter Banner Title" name="title" value="{{$data->title}}"required>
            <div class="text text-justify">{{$errors->first('title')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Banner Description</label>
            <input type="text" class="form-control" id="" placeholder="Enter Banner Description" name="description" value="{{$data->description}}"required>
            <div class="text text-justify">{{$errors->first('description')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Banner Image Upload</label>
            <input type="file" id="exampleInputFile" name="image" value="{{$data->image}}"required>
                  <div class="text text-justify">{{$errors->first('image')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Banner Image Description</label>
            <input type="text" class="form-control" id="" placeholder="Enter Banner Image Description" name="imagedescription" value="{{$data->imagedescription}}"required>
                  <div class="text text-justify">{{$errors->first('imagedescription')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Facebook Url</label>
            <input type="url" class="form-control" id="" placeholder="Enter Facebook Url" name="facebook" value="{{$data->facebook}}"required>
                  <div class="text text-justify text-primary">{{$errors->first('facebook')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Twitter Url</label>
            <input type="url" class="form-control" id="" placeholder="Enter Twitter Url" name="twitter" value="{{$data->twitter}}"required>
                  <div class="text text-justify">{{$errors->first('twitter')}}</div>
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1"> Linkedin Url</label>
            <input type="url" class="form-control" id="" placeholder="Enter Linkedin Url" name="linkedin" value="{{$data->linkedin}}"required>
                  <div class="text text-justify">{{$errors->first('linkedin')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"> Youtube Url</label>
            <input type="url" class="form-control" id="" placeholder="Enter Youtube Url" name="youtube" value="{{$data->youtube}}"required>
                  <div class="text text-justify">{{$errors->first('youtube')}}</div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Status</label><br>
            <input type="radio" name="status" value="Active" class="minimal-red" <?php echo $data->status=='Active'?'checked':''?>> Active &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="status" value="Inactive" class="minimal-red"<?php echo $data->status=='Inactive'?'checked':''?>> Inactive
          </div>
          <div class="modal-footer col-md-6">
            <button type="submit" class="btn btn-info pull-left">Update Banner</button>  
          </div>
      </form>
      <div class="modal-footer col-md-6">
      <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default ">Cancel</button></a>
      </div>
      </div>
    </div>
  </div>
</div>
</section> 
@endsection