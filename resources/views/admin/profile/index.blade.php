@extends('admin.admin_master')
@section('admin')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                        <h3 class="widget-user-username">User Name : {{ $user->name }}</h3>
                        <a href="{{ route('profile.edit') }}" class="btn btn-success float-right">
                            <i class="fa fa-edit"></i>
                            <span>Edit Profile</span>
                        </a>
                        <h6 class="widget-user-desc">User Type : {{ $user->user_type }}</h6>
                        <h6 class="widget-user-desc">User Email : {{ $user->email }}</h6>
                    </div>
                    <div class="widget-user-image">
                        <img class="rounded-circle"
                            src="{{ !empty($user->image) ? url($user->image) : url('upload/no_image.jpg') }}"
                            alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">Phone</h5>
                                    <span class="description-text">{{ $user->phone }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                                <div class="description-block">
                                    <h5 class="description-header">Address</h5>
                                    <span class="description-text">{{ $user->address }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">{{ $user->gender }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
