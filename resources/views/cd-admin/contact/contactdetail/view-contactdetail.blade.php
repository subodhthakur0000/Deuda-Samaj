@extends('cd-admin.admin')
@section('content')

<section class="content-header">
  <h1>
    Contact Detail
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-phone"></i>Home</a></li>
    <li class="active"><a href="{{url('/contacts')}}">Contact</a></li>
    <li class="active"><a href="{{url('/viewcontactdetail')}}">contactdetail</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
       <a href="{{url('/addcontactdetail')}}"> <button type="button" class="btn btn-info">Add Contact Detail</button></a>
     </div>
     <br>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Contact Detail</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover table_center">
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
                 <button class="btn btn-success"  data-toggle="modal" data-target="#modal{{$c->id}}"style="margin-right: 5px;"><i class="fa fa-eye"></i></button>       
                  <a href="{{url('/editcontactdetail/'.$c->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$c->id}}"><i class="fa fa-trash"></i></button>
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
@foreach($contactdetail as $c)
<!-- pop up models for view-->
<div class="modal fade" id="modal{{$c->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Contact Detail</h4>
        </div>
        <div class="modal-body">
               <strong>Email</strong>
                <p>{!!str_limit(e($c['email']),'100')!!}</p><br>
                <strong>Phone</strong>
                <p>{!!str_limit(e($c['phone']),'15')!!}</p><br>
                <strong>Address</strong>
                <p>{!!str_limit(e($c['address']),'150')!!}</p><br>
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
        <div class="modal modal-danger fade" id="modal-danger{{$c->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Contact Detail</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($c['email'])}} ?</p>
                </div>
                <div class="modal-footer">
                  
                  <form action="{{url('/deletecontactdetail/'.$c->id)}}" method="POST">
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