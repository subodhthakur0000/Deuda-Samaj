@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>SEO</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url()->current()}}">SEO</a></li>
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
          <h3 class="card-title">SEO Details</h3>
          <a href="{{url('/addseo')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Add SEO</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table_center">
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


                 <button class="btn btn-success"  data-toggle="modal" data-target="#modal-lg{{$seos->id}}"style="margin-right: 5px;"><i class="fa fa-eye" ></i></button>       
                  <a href="{{url('/editseo',$seos->id)}}"><button class="btn btn-warning"  style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$seos->id}}"><i class="fa fa-trash"></i></button>
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

@foreach($seo as $seos)

<!-- view Modal -->
<div class="modal fade" id="modal-lg{{$seos->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">View SEO</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <strong>Page Title</strong>
                <p>{!!str_limit(e($seos['pagetitle']),'100')!!}</p><br>
                <strong>SEO Title</strong>
                <p>{!!str_limit(e($seos['seotitle']),'100')!!}</p><br>
                <strong>SEO Keyword</strong>
                <p>{!!str_limit(e($seos['seokeyword']),'150')!!}</p><br>
                <strong>SEO Description</strong>
                <p>{!!$seos['seodescription']!!}</p><br>
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
<div class="modal fade" id="modal-danger{{$seos->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">SEO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($seos['pagetitle'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deleteseo/'.$seos->id)}}" method="POST">
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