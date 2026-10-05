@extends('admin.admin_master')

@section('admin')
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Change User Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="{{ route('profile.password.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <h5>Current Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="current_password" class="form-control"
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    @error('current_password')
                        <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <h5>New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password" class="form-control"
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password_confirmation" class="form-control"
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="text-xs-right float-right my-2">
                        <input type="submit" class="btn btn-rounded btn-info" value="Change Password">
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
