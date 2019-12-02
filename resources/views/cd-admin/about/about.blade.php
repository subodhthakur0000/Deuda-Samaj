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
          <li class="breadcrumb-item"><a href="{{url()->current()}}">About</a></li>
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
          <h3 class="card-title">About Details</h3>
          <a href="{{url('/createabout')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Add About</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table_center">
            <thead>
              <tr>
                <th>About Title</th>
                <th>About Summary</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $datas)
           <tr>
            <td>{!!str_limit(e($datas['title']),'20')!!}</td>
            <td>{!!str_limit($datas['summary'],'20')!!}</td>
            <td>
              <form action="{{url('/updateaboutstatus/'.$datas['id'])}}" method="POST">
                @csrf
                <div class="btn-group">
                 @if($datas['status'] == 'Active')
                 <button type="button" class="btn btn-success">{{$datas['status']}}</button>
                 @else
                 <button type="button" class="btn btn-danger">{{$datas['status']}}</button>
                 @endif
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                @if($datas['status'] == 'Active')
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
             <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg{{$datas['id']}}" style="margin-right: 5px;"><i class="fa fa-eye" ></i></button>       
                  <a href="{{URL('/editabout',$datas['id'])}}"><button class="btn btn-warning btn-sm"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#modal-danger{{$datas['id']}}"><i class="fa fa-trash"></i></button>
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

@foreach($data as $datas)

<!-- view Modal -->
<div class="modal fade" id="modal-lg{{$datas->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">{{$datas->title}}</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <strong class="float-left">Status: </strong>
                @if($datas['status']=='Active')
                <p><button class="btn btn-success">{{$datas['status']}}</button></p><br>
                @else
                <p><button class="btn btn-danger">{{$datas['status']}}</button></p><br>
                @endif
                <p><img class="bannerimage1" src="{{url('/public/uploads/'.$datas->image)}}"></p><br>
        
        <strong>About Summary</strong>
                <p>{{e($datas['summary'])}}</p><br>
                <strong>About Description</strong>
                <p>{!!$datas['description']!!}</p><br>
               
                <strong>About Image Description</strong>
                <p>{{e($datas['imagedescription'])}}</p><br>
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
<div class="modal fade" id="modal-danger{{$datas->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">About</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($datas['title'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deleteabout/'.$datas->id)}}" method="POST">
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