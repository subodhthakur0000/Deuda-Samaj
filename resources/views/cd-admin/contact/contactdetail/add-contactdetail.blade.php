@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Contact Detail
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-phone"></i>Dashboard</a></li>
    <li class="active"><a href="{{url('/contacts')}}">Contact</a></li>
    <li class="active"><a href="{{url('/viewcontactdetail')}}">Contact Detail</a></li>
    <li class="active"><a href="{{url()->current()}}">Add Contactdetail</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Contact Details</h3>
      </div>
      <div class="box-body">
      <form action="{{url('/storecontactdetail/')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" required class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" value="{{old('email')}}" >
            <div class="text text-danger">{{ $errors->first('email') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Phone Number" value="{{old('phone')}}" >
            <div class="text text-danger">{{ $errors->first('phone') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Enter Address" value="{{old('address')}}" >
            <div class="text text-danger">{{ $errors->first('address') }}</div>
          </div>
          <div class="modal-footer col-md-6">
            <button type="submit" class="btn btn-info pull-left">Add Contact Detail</button>  
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