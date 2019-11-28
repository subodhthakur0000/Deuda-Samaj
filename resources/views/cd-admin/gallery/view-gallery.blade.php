@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Gallery 
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i>Dashboard</a></li>
    <li class="active"><a href="{{url()->current()}}">Gallery</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      <div>
        <a href="{{URL('/creategallery')}}">
          <button type="button" class="btn btn-info">
          Add Image</button></a>
        </div><br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div>
              <h3 class="box-title">View Gallery </h3><br><br>
            </div>

            @foreach($data as $d)
            <div class="container" id="status">
              <div class="gallery-image">
                <img id="img" class="img-fluid" src="{{asset('public/uploads/'.$d->image)}}">
                </div>
                <div class="carousel-caption">
                  <h3 class="h3-responsive">{{$d['title']}}</h3>
              <form action="{{url('/updategallerystatus/'.$d->slug)}}" method="POST">
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
              <button class="btn btn-danger pull-left"  data-toggle="modal" data-target="#modal-danger{{$d->slug}}"><i class="fa fa-trash"></i></button>
            </div>
          </div>
        </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

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

      <!--Models for delete image-->
      <div class="modal modal-danger fade" id="modal-danger{{$d->slug}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Gallery</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete {{e($d['title'])}}?</p>
              </div>
              <div class="modal-footer">
                
                <form action="{{url('/deletegallery/'.$d->slug)}}" method="POST">
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