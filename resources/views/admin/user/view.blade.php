@extends('admin.admin_master')

@section('admin')
		<!-- Main content -->
		<section class="content">
		  <div class="row">


			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>

<a href="{{ route('user.create') }}" class="btn btn-success float-right">
    <i class="fa fa-plus"></i>
    <span>Add User</span>
</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped text-center align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $users as $key => $user )
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $user->user_type }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td><a href="#" class="btn btn-info"><i class="fa fa-edit "></i> Edit</a></td>
								<td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

@endsection
