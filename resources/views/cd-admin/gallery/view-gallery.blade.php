@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Gallery</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url()->current()}}">Gallery</a></li>
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
          <h3 class="card-title">Gallery Details</h3>
          <a href="{{url('/creategallery')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Add Image</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          @foreach($data as $d)
            <div class="container" id="status">
              <div class="gallery-image">
                <img id="img" class="img-fluid" src="{{asset('public/uploads/'.$d->image)}}">
                </div>
                <div class="carousel-caption">
                  <h3 class="h3-responsive">{{$d['title']}}</h3>
              <form action="{{url('/updategallerystatus/'.$d->id)}}" method="POST">
                @csrf
                <div class="btn-group pull-right">
                 @if($d->status == 'Active')
                 <button type="button" class="btn btn-success">{{$d->status}}</button>
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
            <div>
              <button class="btn btn-danger pull-left"  data-toggle="modal" data-target="#modal-danger{{$d->id}}"><i class="fa fa-trash"></i></button>
            </div>
          </div>
        </div>
          @endforeach
         
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

<!-- css of album -->
<style type="text/css">

  .container{
    width: calc(48% - 6px);
    overflow:hidden;
    height: fit-content;
    margin:3px;
    padding: 0;
    display:block;
    position:relative;
    float:left;
  }
  #img{
    width: 1200px;
    height: 300px;
    transition-duration: .3s;
    max-width: 100%;
    display:block;
    overflow:hidden;
    cursor:pointer;
  }


  @media only screen and (max-width: 900px) {
    .container {
      width: calc(50% - 6px);
    }
  }
  @media only screen and (max-width: 400px) {
    .container {
      width: 100%;
    }
  }
</style>

@foreach($data as $d)
<!-- delete modal -->
<div class="modal fade" id="modal-danger{{$d->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Gallery</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($d['title'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deletegallery/'.$d->id)}}" method="POST">
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