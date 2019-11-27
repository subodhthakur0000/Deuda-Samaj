@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
     About
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{url('/abouts')}}">About</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div>
       <a href="{{url('/createabout')}}"> <button type="button" class="btn btn-info">Create About</button></a>
     </div>
     <br>
     
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View About Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $datas)
           <tr>
            <td>{!!str_limit(e($datas['title']),'100')!!}</td>
            <td>{!!str_limit($datas['description'],'150')!!}</td>
            <td>
              <form action="{{url('/updateaboutstatus/'.$datas['slug'])}}" method="POST">
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
             <div class="btn-group">
               <button type="button" class="btn btn-default">Action</button>
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                 <span class="caret"></span>
                 <span class="sr-only">Toggle Dropdown</span>
               </button>
               <ul class="dropdown-menu" role="menu">
                 <li><a data-toggle="modal" data-target="#modal{{$datas['slug']}}">View</a></li>
                 <li><a  href="{{URL('/editabout',$datas['slug'])}}">Edit</a></li>
                 <li><a data-toggle="modal" data-target="#modal-danger{{$datas['slug']}}">Delete</a></li>
               </ul>
             </div>
           </td>
         </tr>
         @endforeach        
     </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- ./wrapper -->

@foreach($data as $datas)
<!-- pop up models for view -->
<div class="modal fade" id="modal{{$datas['slug']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View About</h4>
        </div>
        <div class="modal-body">
                <strong>Title</strong>
                <p>{{e($datas['title'])}}</p><br>
                <strong>Summary</strong>
                <p>{{e($datas['summary'])}}</p><br>
                <strong>Description</strong>
                <p>{!!$datas['description']!!}</p><br>
                <strong>Image</strong>
                <p><img src="{{ url('public/uploads/'.$datas['image'])}}" class="image1" alt=""></p><br>
                <strong>Image Description</strong>
                <p>{{e($datas['imagedescription'])}}</p><br>
                <strong>Status</strong>
                @if($datas['status']=='Active')
                <p><button class="btn btn-success">{{$datas['status']}}</button></p><br>
                @else
                <p><button class="btn btn-danger">{{$datas['status']}}</button></p><br>
                @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  


    <!--Models for delete -->
        <div class="modal modal-danger fade" id="modal-danger{{$datas['slug']}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">About</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deleteabout/'.$datas->slug)}}" method="POST">
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
      @endforeach

      <style type="text/css">
        .image1{
          height: 200px;
        width: 200px;
        }
      </style>
      @endsection