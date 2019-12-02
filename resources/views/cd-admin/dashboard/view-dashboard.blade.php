@extends('cd-admin.admin-master')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$countcontact}}</h3>

              <p>Contact</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope"></i>
            </div>
            <a href="{{url('/contacts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$countreplied}}</h3>

              <p>Replied Contact</p>
            </div>
            <div class="icon">
              <i class="fas fa-mail-reply-all"></i>
            </div>
            <a href="{{url('/contacts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$countnotreplied}}</h3>

              <p>Not Replied Contact</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope"></i>
            </div>
            <a href="{{url('/contacts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$countquickmail}}</h3>

              <p>Quick Mail</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div>
            <a href="{{url('/viewquickmail')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    <div class="row">
        <!-- Left col -->
    <section class="col-lg-7">
      <!-- TO DO List -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-envelope"></i>

              Quick Email
          </h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{url('/storequickmail')}}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              
            
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Left col -->

     <section class="col-lg-5">
      <!-- TO DO List -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Recent Quick Email
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($quick as $quiks)
                    <tr>
                    <td class="mailbox-name"><a href=""data-toggle="modal" data-target="#modal{{$quiks->id}}">{{$quiks->emailto}}</a></td>
                    <td class="mailbox-subject">{!!str_limit(e($quiks->subject),$limit='10')!!}</td>
                    <td class="mailbox-subject">{!!str_limit($quiks->message,$limit='10')!!}</td>
                    
                  </tr>
                  @endforeach

                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{url('/viewquickmail')}}"><button type="button" class="btn btn-info btn-sm">View Quick Emails</button></a>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    

</div>
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

 @foreach($quick as $quiks)
    <div class="modal fade" id="modal{{$quiks->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
          <h4 class="modal-title">View Quick Email</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <strong>Email To </strong>
          <p>{!!e($quiks['emailto'])!!}</p><br>
          <strong>Subject</strong>
          <p>{!!e($quiks['subject'])!!}</p><br>
          <strong>Message</strong>
          <p>{!!$quiks['message']!!}</p><br>
          <strong>Sent At</strong>
          <p>{{date('F d,Y',strtotime($quiks['created_at']))}} at {{date('g:ia',strtotime($quiks['created_at']))}}</p><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    
  </div>
    @endforeach
@endsection