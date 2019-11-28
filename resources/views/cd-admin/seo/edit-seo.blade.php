@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    SEO
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Dashboard</a></li>
    <li class="active"><a href="{{url('/viewseo')}}">SEO</a></li>
    <li class="active"><a href="{{url()->current()}}">Edit SEO</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit SEO Details</h3>
      </div>
      <form action="{{url('/updateseo',$seo->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Page Title</label>
              <select class="form-control" id="exampleFormControlSelect1" name="pagetitle" value="{{$seo['pagetitle']}}">
                <option value="Home">Home</option>
                <option value="Banner">Banner</option>
                <option value="About">About</option>
                <option value="Gallery">Gallery</option>
                <option value="Contact">Contact</option>
              </select>
              <div class="text text-danger">{{ $errors->first('pagetitle') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="seotitle" placeholder="Enter Summary" value="{{$seo['seotitle']}}" >
              <div class="text text-danger">{{ $errors->first('seotitle') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO Keyword</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="seokeyword" placeholder="Enter Summary" value="{{$seo['seokeyword']}}" >
              <div class="text text-danger">{{ $errors->first('seokeyword') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO Description</label>
              <textarea class="form-control" placeholder="Enter Description" name="seodescription" >{{$seo['seodescription']}}</textarea>
              <div class="text text-danger">{{ $errors->first('seodescription') }}</div>
            </div>
            <div class="modal-footer col-md-6">
              <button type="submit" class="btn btn-info pull-left">Update Seo</button>  
            </div>
          </form>
          <div class="modal-footer col-md-6">
            <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default ">Cancel</button></a>
          </div>
        </div>
      </div>
    </section> 
    @endsection