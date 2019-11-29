@extends('cd-admin.admin')
@section('content')
<section class="content">
  <div class="row">
    <section class="content-header">
      <h1>
        About
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('/abouts')}}">About</a></li>
        <li class="active"><a href="{{url()->current()}}">Edit About</a></li>
      </ol>
    </section><br>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit About</h3>
          </div>
          <form action="{{url('/updateabout',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">About Title</label>
                  <input type="text" class="form-control ui-datepicker" id="exampleInputEmail1" name="title" placeholder="Enter About Title" value="{{$data->title}}" >
                  <div class="text text-danger">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">About Summary</label><br>
                  <textarea placeholder="Enter About Summary " name="summary" rows="4" cols="174">{{$data->summary}}</textarea>
                  <div class="text text-danger">{{ $errors->first('summary') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">About Description</label>
                  <textarea id="summernote" placeholder="Enter About Description" name="description" >{{$data->description}}</textarea>
                  <div class="text text-danger">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">About Image Upload</label>
                  <input type="file" id="exampleInputFile" name="image" value="{{$data->image}}">
                  <div class="text text-danger">{{ $errors->first('image') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">About Image Description</label>
                  <input type="text" class="form-control" id="" placeholder="Enter About Image Description" name="imagedescription" value="{{$data->imagedescription}}">
                  <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label><br>
                  <input type="radio" name="status"class="minimal-red" <?php echo $data->status=='Active'?'checked':''?> value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="status" class="minimal-red" <?php echo $data->status=='Inactive'?'checked':''?> value="Inactive"> Inactive
                </div>

                <div>
                   <div class="modal-footer col-md-6">
                    <button type="submit" class="btn btn-info pull-left">Update About</button>  
                  </div>
              </form>
              <div class="modal-footer col-md-6">
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default ">Cancel</button></a>
              </div>
          </div>
    </div>
  </section> 


  @endsection