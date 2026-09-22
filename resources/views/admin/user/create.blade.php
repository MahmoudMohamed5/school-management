@extends('admin.admin_master')

@section('admin')
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="user_type" id="user_type" required class="form-control">
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- 1 /.col_md_6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>
                                 @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- 2 /.col_md_6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <!-- 3 /.col_md_6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>
                            </div>
                        </div> <!-- 4 /.col_md_6 -->


                    </div>
                     <!-- /.row -->
                     <div class="text-xs-right float-right my-2">
                            <input type="submit" class="btn btn-rounded btn-info" value="Save">
                        </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
