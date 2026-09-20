@include('admin.body.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.body.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        @yield('admin')
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@include('admin.body.footer')
