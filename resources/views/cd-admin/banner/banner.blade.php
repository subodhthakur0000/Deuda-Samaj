@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Banner</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url()->current()}}">Banner</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Banner Details</h3>
          <a href="{{url('/createbanner')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Add Banner</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
                      <a href="{{$d->facebook}}" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-facebook"></i>
                        </a>
                      @endif
                      @if(isset($d['twitter']))
                      <a href="{{$d->twitter}}" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-twitter"></i>
                      </a>
                      @endif
                      @if(isset($d['linkedin']))
                      <a href="{{$d->linkedin}}" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-linkedin-in"></i>
                      </a>
                      @endif
                      @if(isset($d['youtube']))
                      <a href="{{$d->youtube}}" target="_blank" class="btn btn-danger btn-sm"><i class="fab fa-youtube"></i>
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

                  <button class="btn btn-success"  data-toggle="modal" data-target="#modal-lg{{$d->id}}"style="margin-right: 5px;"><i class="fas fa-eye" ></i></button>       
                  <a href="{{url('editbanner/'.$d->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fas fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$d->id}}"><i class="fas fa-trash"></i></button>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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

@foreach($data as $d)

<!-- view Modal -->
<div class="modal fade" id="modal-lg{{$d->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">{{$d->title}}</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <strong class="float-left">Status: </strong>
                @if($d['status']=='Active')
                <p><button class="btn btn-sm btn-success">{{$d['status']}}</button></p><br>
                @else
                <p><button class="btn btn-sm btn-danger">{{$d['status']}}</button></p><br>
                @endif
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


<!-- delete modal -->
<div class="modal fade" id="modal-danger{{$d->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Banner</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($d['title'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deletebanner/'.$d->id)}}" method="POST">
                @csrf
                 @method('DELETE')
              <button type="submit" class="btn btn-outline-light">Yes</button>
              </form>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @endforeach

     
@endsection