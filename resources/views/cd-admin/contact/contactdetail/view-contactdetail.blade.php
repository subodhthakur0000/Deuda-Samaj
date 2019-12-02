@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/contacts')}}">Contact</a></li>
          <li class="breadcrumb-item"><a href="{{url('/viewcontactdetail')}}">Contactdetail</a></li>
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
          <h3 class="card-title">Contact Details</h3>
          <a href="{{url('/addcontactdetail')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Add Contact Detail</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table_center">
            <thead>
              <tr>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contactdetail as $c)
              <tr>
                <td>{{e($c['email'])}}</td>
                <td>{{e($c['phone'])}}
                </td>
                <td>{{e($c['address'])}}</td>
                <td> 
                 <button class="btn btn-success"  data-toggle="modal" data-target="#modal-lg{{$c->id}}"style="margin-right: 5px;"><i class="fa fa-eye"></i></button>       
                  <a href="{{url('/editcontactdetail/'.$c->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$c->id}}"><i class="fa fa-trash"></i></button>
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

@foreach($contactdetail as $c)

<!-- view Modal -->
<div class="modal fade" id="modal-lg{{$c->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">View Contact Detail</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <strong>Email</strong>
                <p>{!!str_limit(e($c['email']),'100')!!}</p><br>
                <strong>Phone</strong>
                <p>{!!str_limit(e($c['phone']),'15')!!}</p><br>
                <strong>Address</strong>
                <p>{!!str_limit(e($c['address']),'150')!!}</p><br>
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
<div class="modal fade" id="modal-danger{{$c->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Contact Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($c['email'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deletecontactdetail/'.$c->id)}}" method="POST">
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