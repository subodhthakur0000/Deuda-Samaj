@extends('cd-admin.admin-master')
@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>ADMIN DETAILS</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">admin</li>
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
					<a href="{{url('/addadmin')}}"><button type="button" class="btn bg-gradient-primary">Add Admin</button></a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
					            <th>Email</th>
					            <th>Image</th>
					            <th>Role</th>
					            <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $d)
							<tr>
								<td>{{$d->name}}</td>
								<td>{{$d->email}}
								</td>
								<td><img src="{{ asset('public/uploads/'.$d->image) }}" class="img1" alt="User Image"></td>
								<td>{{$d->role}}</td>
								<td>
									<div class="btn-group">
						                    <button type="button" class="btn btn-success">Action</button>
						                    <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
						                      <span class="sr-only">Toggle Dropdown</span>
						                      </button>
						                      <div class="dropdown-menu" role="menu">
						                        <a class="dropdown-item btn-danger" data-toggle="modal" data-target="#modal-danger{{$d->id}}">Delete</a>
						                      </div>
					                  </div>
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

@foreach($data as $d)
<!-- delete modal -->
<div class="modal fade" id="modal-danger{{$d->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this admin ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form action="{{url('/deleteadmin/'.$d->id)}}" method="POST">
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-light">Yes</button>
                    @csrf
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

      <style>
        .img1 {
             border-radius: 50%;
             height: 70px;
             width:70px;
            }
      </style>
@endsection