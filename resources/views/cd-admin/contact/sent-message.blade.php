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
          <li class="breadcrumb-item"><a href="{{url()->current()}}">Sent Message</a></li>
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
          <h3 class="card-title">Sent Message</h3>
          <a href="{{URL()->previous()}}"><button type="button" class="btn bg-gradient-primary float-sm-right" style="margin-left: 5px;">Back</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table_center">
            <tbody>
                  @foreach($reply as $r)
                  <tr>
                    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$r['id']}}"><i class="fas fa-trash"></i></button></td>
                    <td ><a data-toggle="modal" data-target="#modal{{$r['id']}}"> <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button></a></td>
                    <td class="mailbox-name">{{e($r['email'])}}</td>
                    <td class="">{{e($r['subject'])}}</td>
                    <td class="">{!!str_limit($r['message'],$limits='30')!!}
                    </td>
                    <td class="mailbox-date">{{date('F d,Y',strtotime($r['created_at']))}} at {{date('g:ia',strtotime($r['created_at']))}}</td>
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

@foreach($reply as $r)

<!-- view Modal -->
<div class="modal fade" id="modal{{$r['id']}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              
                 <h4 class="modal-title">View Sent Message</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Email:</p> <br>
                <p>{{e($r['email'])}}</p><br>
                <p>Subject :</p> <br>
                <p>{{e($r['subject'])}}</p><br>
                <p>Message : <table ><tr><td>
                  {!!$r['message']!!}
                </td></tr></table></p>
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
<div class="modal fade" id="modal-danger{{$r['id']}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Sent Message</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this {{e($r['email'])}}?</p>
            </div>
            <div class="modal-footer justify-content-between">
               <form action="{{url('/deletereply',$r['id'])}}" method="POST">
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