@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('/contact')}}">Contact</a></li>
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
          <a href="{{url('/addcontact')}}"><button type="button" class="btn bg-gradient-primary float-sm-right" style="margin-left: 5px;">Add Contact</button></a>
          <a href="{{url('/sentmessage')}}"><button type="button" class="btn bg-gradient-primary float-sm-right">Sent Message</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table_center">
            <tbody>
                  @foreach($data as $datas)
                    <tr>
                    <td><a href="" class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$datas['id']}}"><i class="fa fa-trash"></i></a></td>
                    <td><a class="btn btn-default"  data-toggle="modal" data-target="#modal-view{{$datas['id']}}"><i class="fa fa-eye"></i></a></td>
                    <td class="mailbox-name">{{e($datas['name'])}}</td>
                    <td class="mailbox-subject">{!!$datas['email']!!}</td>
                    <td>
                    @if($datas['status']=="Not Replied")
                    <button type="button" class="btn btn-warning">Not Replied</button>
                    @else
                      <button type="button" class="btn btn-primary">{{$datas['status']}}</button>
                    @endif
                   </td>
                    <td class="mailbox-date">
                      {{date('F d,Y',strtotime($datas['created_at']))}} at {{date('g:ia',strtotime($datas['created_at']))}}
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
<div class="modal fade" id="modal-view{{$datas['id']}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">View Contact</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><b>Name :</b></p>
                <p>{{e($datas['name'])}}</p><br>
                <p><b>Email ID:</b></p>
                <p>{{e($datas['email'])}}</p><br>
                <p><b>Message:</b></p>
                <p>{!!$datas['message']!!}</p><br>
                <p><b>Sent At:</b></p>
                <p>{{date('F d,Y',strtotime($datas['created_at']))}} at {{date('g:ia',strtotime($datas['created_at']))}}</p><br>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{url('replymessage',$datas['id'])}}"><button class="btn btn-primary pull-left">Reply</button></a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<!-- delete modal -->
<div class="modal fade" id="modal-danger{{$datas['id']}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Contacts</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($datas['email'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deletecontacts/'.$datas['id'])}}" method="POST">
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