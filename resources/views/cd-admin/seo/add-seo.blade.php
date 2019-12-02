@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>SEO</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/viewseo')}}">SEO</a></li>
          <li class="breadcrumb-item active"><a href="{{url()->current()}}">Add SEO</a></li>
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
        <h3 class="card-title">Add SEO Details</h3>
      </div>
      <div class="card-body">
        <form role="form" action="{{url('/storeseo')}}" method="POST" enctype="multipart/form-data" id="the-form">
          @csrf

          <div class="form-group">
            <label >Page Title</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
              </div>
              <select class="form-control" id="exampleFormControlSelect1" name="pagetitle" value="{{old('pagetitle')}}">
                <option value="Home">Home</option>
                <option value="Banner">Banner</option>
                <option value="About">About</option>
                <option value="Gallery">Gallery</option>
                <option value="Contact">Contact</option>
              </select>
              <div class="text text-danger">{{ $errors->first('pagetitle') }}</div>
            </div>
            <div class="form-group">
              <label >SEO Title</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
                </div>
                <input type="text" class="form-control" id="exampleInputEmail1" name="seotitle" placeholder="Enter SEO Title" value="{{old('seotitle')}}" >
                <div class="text text-danger">{{ $errors->first('seotitle') }}</div>
              </div>
            </div>
            <div class="form-group">
              <label >SEO Keyword</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
                </div>
                <input type="text" class="form-control" id="exampleInputEmail1" name="seokeyword" placeholder="Enter SEO Keyword" value="{{old('seokeyword')}}" >
                <div class="text text-danger">{{ $errors->first('seokeyword') }}</div>
              </div>
            </div>

            <div class="form-group">
              <label >SEO Description</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-align-justify text-success"></i></span>
                </div>
                <textarea  placeholder="Enter Seo Description" name="seodescription"  class="form-control"  rows="4" cols="174">{{old('seodescription')}}</textarea>
                <div class="text text-danger">{{ $errors->first('seodescription') }}</div>
              </div>
            </div>

            

            

            <button type="submit" class="btn btn-info" style="float: left">Add SEO</button> 
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