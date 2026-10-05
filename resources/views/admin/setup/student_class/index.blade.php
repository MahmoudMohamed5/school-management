@extends('admin.admin_master')

@section('admin')
    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Class List</h3>

                        <a href="{{ route('student.class.create') }}" class="btn btn-success float-right">
                            <i class="fa fa-plus"></i>
                            <span>Add Student Class</span>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student_classes as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                <a href="{{ route('student.class.edit', $value->id) }}"
                                                    class="btn btn-info"><i class="fa fa-edit "></i> Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('student.class.destroy', $value->id) }}"
                                                    class="btn btn-danger delete-confirm" id="delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

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
