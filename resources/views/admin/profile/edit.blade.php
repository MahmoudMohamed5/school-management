@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Manage Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Phone <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $user->phone }}">
                                </div>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                </div>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Gender <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" disabled @selected(old('gender', $user->gender ?? null) == null)>Select Gender</option>
                                        <option value="Male" @selected(old('gender', $user->gender ?? '') == 'Male')>Male</option>
                                        <option value="Female" @selected(old('gender', $user->gender ?? '') == 'Female')>Female</option>
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
                                    <img id="showImage"
                                        src="{{ !empty($user->image) ? url($user->image) : url('upload/no_image.jpg') }}"
                                        alt="Profile Image"
                                        style="width: 100px; height: 100px; border: 1px solid #000; object-fit: cover; margin-right:10px ;">
                                    @if ($user->image)
                                        <a
                                            href="{{ route('profile.image.delete', $user->id) }}"class="btn btn-rounded btn-info " >Remove
                                            Image</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                    <div class="text-xs-right float-right my-2">
                        <input type="submit"  class="btn btn-rounded btn-info" value="Update">
                    </div>
                </form>


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
