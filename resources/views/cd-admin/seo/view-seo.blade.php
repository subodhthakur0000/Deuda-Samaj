@extends('cd-admin.admin')
@section('content')

<section class="content-header">
  <h1>
    SEO
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Dashboard</a></li>
    <li class="active"><a href="{{url('/viewseo')}}">SEO</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
       <a href="{{url('/addseo')}}"> <button type="button" class="btn btn-info">Add SEO</button></a>
     </div>
     <br>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">SEO</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover table_center">
            <thead>
              <tr>
                <th>Page Title</th>
                <th>SEO Title</th>
                <th>SEO Keyword</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($seo as $seos)
              <tr>
                <td>{{e($seos['pagetitle'])}}</td>
                <td>{{e($seos['seotitle'])}}
                </td>
                <td>{{e($seos['seokeyword'])}}</td>
                <td> 


                 <button class="btn btn-success"  data-toggle="modal" data-target="#modal"style="margin-right: 5px;"><i class="fa fa-eye" ></i></button>       
                  <a href="{{url('/editseo',$seos->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$seos->id}}"><i class="fa fa-trash"></i></button>
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
@foreach($seo as $seos)
<!-- pop up models for view-->
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View SEO</h4>
        </div>
        <div class="modal-body">
          <strong>Page Title</strong>
                <p>{!!str_limit(e($seos['pagetitle']),'100')!!}</p><br>
                <strong>SEO Title</strong>
                <p>{!!str_limit(e($seos['seotitle']),'100')!!}</p><br>
                <strong>SEO Keyword</strong>
                <p>{!!str_limit(e($seos['seokeyword']),'150')!!}</p><br>
                <strong>SEO Description</strong>
                <p>{!!str_limit(e($seos['seodescription']),'150')!!}</p><br>
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
        <div class="modal modal-danger fade" id="modal-danger{{$seos->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">SEO</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($seos['pagetitle'])}} ?</p>
                </div>
                <div class="modal-footer">
                  
                  <form action="{{url('/deleteseo/'.$seos->id)}}" method="POST">
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