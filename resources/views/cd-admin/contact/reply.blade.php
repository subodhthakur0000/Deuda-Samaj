@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/contact')}}">Contact</a></li>
          <li class="breadcrumb-item active"><a href="{{url()->current()}}">Reply</a></li>
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
        <h3 class="card-title">Reply Form</h3>
      </div>
      <div class="card-body">
        <form role="form" action="{{url('/replystore',$data->id)}}" method="POST" enctype="multipart/form-data" id="the-form">
          @csrf
        <div class="form-group">
          <label >Email</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$data['email']}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label >Subject</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
            </div>
            <input type="text" class="form-control" name="subject" placeholder="Enter Subject" value="{{old('subject')}}" >
                <div class="text text-danger">{{ $errors->first('subject') }}</div>
          </div>
        </div>
                  
                  <div class="form-group">
          <label >Message</label>
          <textarea class="textarea" name="message" placeholder="Place some text here"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('message')}}</textarea>
          <div class="text text-danger">{{ $errors->first('message') }}</div>
                        <input type="hidden" class="form-control" name="status"  value="Not Replied">
        <button type="submit" class="btn btn-info" style="float: left">Send</button> 
        <input type="hidden" name="status"checked value="Replied">
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