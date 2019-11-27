@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Contact
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Home</a></li>
    <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
       <a href="{{url('/addcontact')}}"> <button type="button" class="btn btn-info">Add Contact</button></a>
       <a href="{{url('/sentmessage')}}"> <button type="button" class="btn btn-info">Sent Message</button></a>

     </div>
     <br>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contact</h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <a href="{{url('/contacts')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
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
                      <?php $date = Carbon\Carbon::parse($datas['created_at']);
                     $now = Carbon\Carbon::now();
                      $diff = $date->diffForHumans($now);
                      ?>
                      {{$diff}}</td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
             
                <!-- /.btn-group -->
                <a href="{{url('/contacts')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
             
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>

      </section>

@foreach($data as $datas)

        <div class="modal fade" id="modal-view{{$datas['id']}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View contacts</h4>
              </div>
              <div class="modal-body">
                <p><b>Name :</b></p>
                <p>{{e($datas['name'])}}</p><br>
                <p><b>Email ID:</b></p>
                <p>{{e($datas['email'])}}</p><br>
                <p><b>Mobile Number:</b></p>
                <p>{{e($datas['mobilenumber'])}}</p><br>
                <p><b>Message:</b></p>
                <p>{!!$datas['message']!!}</p><br>
                <p><b>Sent At:</b></p>
                <p>{{ Carbon\Carbon::parse($datas['created_at'])->format('d-m-Y i') }}</p><br>
                
              </div>
              <div class="modal-footer">
                <a href="{{url('replymessage',$datas['id'])}}"><button class="btn btn-primary">Reply</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!--Models for delete -->
        <div class="modal modal-danger fade" id="modal-danger{{$datas['id']}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">contacts</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($datas['email'])}}?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deletecontacts/'.$datas['id'])}}" method="POST">
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
@endsection