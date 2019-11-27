@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Banner 
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i> Home</a></li>
    <li class="active"><a href="{{url()->current()}}">Banner</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div>
        <a href="{{URL('/createbanner')}}">
          <button type="button" class="btn btn-info">
          Add Banner</button></a>
        </div><br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div>
              <h3 class="box-title">View Banner </h3><br><br>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table_center">
                <thead>
                  <tr>
                    <th>Banner Title</th>
                    <th>Banner Link</th>
                    <th>Banner Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($data as $d)
                 <tr>
                  <td>{{e($d->title)}}</td>
                  <td>
                    <a data-toggle="modal" data-target="#modal-warning{{$d->facebook}}" class="btn btn-social-icon btn-facebook">
                      <span class="fa fa-facebook"></span>
                    </a>
                    <a data-toggle="modal" data-target="#modal-warning{{$d->twitter}}" class="btn btn-social-icon btn-twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                    <a data-toggle="modal" data-target="#modal-warning{{$d->linkedin}}" class="btn btn-social-icon btn-linkedin">
                      <span class="fa fa-linkedin"></span>
                    </a>
                    <a data-toggle="modal" data-target="#modal-warning{{$d->youtube}}" class="btn btn-social-icon btn-danger">
                      <span class="fa fa-youtube"></span>
                    </a>
                  </td>
                  <td><img src="{{asset('public/uploads/'.$d->image)}}" class="img1" alt="User Image">
                  </td>
                  <td>
                    
                    <form action="{{url('/updatebannerstatus/'.$d->slug)}}" method="POST">
                      @csrf
                      <div class="btn-group">
                       @if($d->status == 'Active')
                       <button type="button" class="btn btn-success ">{{$d->status}}</button>
                       @else
                       <button type="button" class="btn btn-danger">{{$d->status}}</button>
                       @endif
                       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      @if($d->status == 'Active')
                      <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                        <li> <button class="btn btn-danger" type="submit">Inactive</button>
                        </li>
                      </div>
                      @else
                      <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                        <li> <button class="btn btn-success" type="submit">Active</button>
                        </li>
                      </div>
                      @endif
                    </div> 
                  </form> 

                </td>
                <td>

                  <button class="btn btn-success"  data-toggle="modal" data-target="#modal-danger{{$d->slug}}"style="margin-right: 5px;"><i class="fa fa-eye" ></i></button>       
                  <button class="btn btn-warning"  data-toggle="modal" data-target="#modal-danger{{$d->slug}}"style="margin-right: 5px;"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$d->slug}}"><i class="fa fa-trash"></i></button>

                </td>
              </tr>
              @endforeach
            </table>

          </div>
          <!-- /.box-body -->

        </div>
      </div>
    </div>
  </div>
</section>


@foreach($data as $d)

<!--Models for delete image-->
<div class="modal modal-danger fade" id="modal-danger{{$d->slug}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete {{e($d['title'])}}?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
          <form action="{{url('/deletebanner/'.$d->slug)}}" method="POST">
            @method('DELETE')
            <button type="submit" class="btn btn-outline">Yes</button>
            @csrf
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  

  <!--Models for banner image-->
<div class="modal modal-warning fade" id="modal-warning{{$d->facebook}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to redirect to {{e($d['facebook'])}} link?</p>
        </div>
        <div class="modal-footer">
          <a href="{{$d->facebook}}" ><button type="button" class="btn btn-outline pull-left">Yes</button></a>
          <button type="button" class="btn btn-outline " data-dismiss="modal">Cancel</button>
            
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!--Models for banner image-->
<div class="modal modal-warning fade" id="modal-warning{{$d->twitter}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to redirect to {{e($d['twitter'])}} link?</p>
        </div>
        <div class="modal-footer">
          <a href="{{$d->twitter}}" ><button type="button" class="btn btn-outline pull-left">Yes</button></a>
          <button type="button" class="btn btn-outline " data-dismiss="modal">Cancel</button>
            
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!--Models for banner image-->
<div class="modal modal-warning fade" id="modal-warning{{$d->linkedin}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to redirect to {{e($d['linkedin'])}} link?</p>
        </div>
        <div class="modal-footer">
          <a href="{{$d->linkedin}}" ><button type="button" class="btn btn-outline pull-left">Yes</button></a>
          <button type="button" class="btn btn-outline " data-dismiss="modal">Cancel</button>
            
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!--Models for banner image-->
<div class="modal modal-warning fade" id="modal-warning{{$d->youtube}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Banner</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to redirect to {{e($d['youtube'])}} link?</p>
        </div>
        <div class="modal-footer">
          <a href="{{$d->youtube}}" ><button type="button" class="btn btn-outline pull-left">Yes</button></a>
          <button type="button" class="btn btn-outline " data-dismiss="modal">Cancel</button>
            
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  

  @endforeach
  @endsection