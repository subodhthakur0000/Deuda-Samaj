@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Banner 
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i> Dashboard</a></li>
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
                  <td>{{$d['title']}}</td>
                  <td>
                    @if(isset($d['facebook']))
                      <a href="{{$d->facebook}}" target="_blank" class="btn btn-social-icon btn-facebook">
                        <span class="fa fa-facebook"></span>
                        </a>
                      @endif
                      @if(isset($d['twitter']))
                      <a href="{{$d->twitter}}" target="_blank" class="btn btn-social-icon btn-twitter">
                      <span class="fa fa-twitter"></span>
                      </a>
                      @endif
                      @if(isset($d['linkedin']))
                      <a href="{{$d->linkedin}}" target="_blank" class="btn btn-social-icon btn-linkedin">
                      <span class="fa fa-linkedin"></span>
                      </a>
                      @endif
                      @if(isset($d['youtube']))
                      <a href="{{$d->youtube}}" target="_blank" class="btn btn-social-icon btn-danger">
                      <span class="fa fa-youtube"></span>
                      </a>
                      @endif
                  </td>
                  <td><img src="{{asset('public/uploads/'.$d->image)}}" class="img1" alt="User Image">
                  </td>
                  <td>
                    
                    <form action="{{url('/updatebannerstatus/'.$d->id)}}" method="POST">
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

                  <button class="btn btn-success"  data-toggle="modal" data-target="#modal-lg{{$d->id}}"style="margin-right: 5px;"><i class="fa fa-eye" ></i></button>       
                  <a href="{{url('editbanner/'.$d->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$d->id}}"><i class="fa fa-trash"></i></button>

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
v
<!-- view Modal -->
<div class="modal fade" id="modal-lg{{$d->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Status</strong>
                @if($d['status']=='Active')
                <p><button class="btn btn-success">{{$d['status']}}</button></p><br>
                @else
                <p><button class="btn btn-danger">{{$d['status']}}</button></p><br>
                @endif
        <h4 class="modal-title" align="center">{{$d->title}}</h4>
      </div>
      <div class="modal-body">
        <p><img class="bannerimage1" src="{{url('/public/uploads/'.$d->image)}}"></p><br>
        
        <p><b>Banner Description:</b><br>&nbsp;{{$d->description}}</p><br>
        
        <p><b>Banner Image Description:</b><br>&nbsp;{{$d->imagedescription}}</p><br>
        
         @if(isset($d['facebook']))
         <p><b>Facebook Url:</b>&nbsp;<br>{{$d->facebook}}</p><br>
         @endif
         @if(isset($d['twitter']))
         <p><b>Twitter Url:</b>&nbsp;<br>{{$d->twitter}}</p><br>
          
         @endif
         @if(isset($d['linkedin']))
         <p><b>Linkedin Url:</b>&nbsp;<br>{{$d->linkedin}}</p><br>
                      
         @endif
         @if(isset($d['youtube']))
         <p><b>Youtube Url:</b>&nbsp;<br>{{$d->youtube}}</p><br>
                     
         @endif
        

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Models for delete image-->
<div class="modal modal-danger fade" id="modal-danger{{$d->id}}">
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
          
          <form action="{{url('/deletebanner/'.$d->id)}}" method="POST">
            @method('DELETE')
            <button type="submit" class="btn btn-outline pull-left">Yes</button>
            @csrf
          </form>
          <button type="button" class="btn btn-outline " data-dismiss="modal">Cancel</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach
  @endsection