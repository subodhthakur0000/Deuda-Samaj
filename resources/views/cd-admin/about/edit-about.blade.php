@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>About</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/abouts')}}">About</a></li>
          <li class="breadcrumb-item active"><a href="{{url()->current()}}">Edit About</a></li>
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
        <h3 class="card-title">Edit About</h3>
      </div>
      <div class="card-body">
        <form role="form" action="{{url('/updateabout',$data->id)}}" method="POST" enctype="multipart/form-data" id="the-form">
          @csrf

         <div class="form-group">
          <label >About Title</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
            </div>
            <input type="text" class="form-control" id="" placeholder="Enter About Title" name="title" value="{{$data->title}}" required>
            <div class="text text-justify">{{$errors->first('title')}}</div>
        </div>
        <div class="form-group">
          <label >About Summary</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
            
            <textarea placeholder="Enter About Summary " name="summary" rows="4" cols="174" required>{{$data->summary}}</textarea>
                  <div class="text text-danger">{{ $errors->first('summary') }}</div>
                  </div>
          </div>
        </div>
        <div class="form-group">
          <label >About Description</label>
          <textarea class="textarea" name="description" placeholder="Place some text here"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$data->description}}</textarea>
          <div class="text text-danger">{{ $errors->first('description') }}</div>
                  <div class="form-group">
                    <label >About Image Upload</label>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text" id=""><i class="fas fa-cloud-upload-alt text-warning" aria-hidden="true"></i></span>
                      </div>
                    <input type="file" id="exampleInputFile" name="image" value="{{$data->image}}">
                  <div class="text text-justify">{{$errors->first('image')}}</div>
                  </div>
                  </div>
                  <div class="form-group">
                      <label >About Image Description</label>
                      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
                            </div>
                            <input type="text" class="form-control" id="" placeholder="Enter About Image Description" name="imagedescription" value="{{$data->imagedescription}}"required>
                  <div class="text text-justify">{{$errors->first('imagedescription')}}</div>
                          </div>
                        </div>
                <div class="form-group">
          <label >Status</label>
          <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="radio" name="status"  id="radioSuccess1" value="Active" <?php echo $data->status=='Active'?'checked':''?>>
                        <label for="radioSuccess1">Active</label>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <div class="icheck-success d-inline">
                        <input type="radio" name="status" id="radioSuccess2" value="Inactive" <?php echo $data->status=='Inactive'?'checked':''?>>
                        <label for="radioSuccess2">Inactive</label>
                      </div>
                      <div class="text text-danger">{{ $errors->first('status') }}</div>
          </div>
          </div>

        <button type="submit" class="btn btn-info" style="float: left">Update About</button> 
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