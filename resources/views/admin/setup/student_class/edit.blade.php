@extends('admin.admin_master')

@section('admin')
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Student Class</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="{{ route('student.class.update', $studentClass->id) }}">
                    @csrf
                @method('put')
                    <div class="form-group">
                        <h5>Student Class Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" value="{{ $studentClass->name }}" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

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
