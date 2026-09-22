 <footer class="main-footer">
     <div class="pull-right d-none d-sm-inline-block">
         <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
             <li class="nav-item">
                 <a class="nav-link" href="javascript:void(0)">FAQ</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Purchase Now</a>
             </li>
         </ul>
     </div>
     &copy; {{ now()->format('Y') }} <a href="#">Psd to Html Expert</a>. All Rights Reserved.
 </footer>

 </div>
 <!-- ./wrapper -->


 <!-- Vendor JS -->
 <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
 <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
 <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
 <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
 <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
 <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
 <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
 <!-- Sunny Admin App -->
 <script src="{{ asset('backend/js/template.js') }}"></script>
 <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

 <!-- sweetalert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script type="text/javascript">
     $(function() {
         $(document).on('click', '#delete', function(e) {
             e.preventDefault();
             var link = $(this).attr("href");
             Swal.fire({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to recover this imaginary file!",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#3085d6",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "Yes, delete it!"
             }).then((result) => {
                 if (result.isConfirmed)
                     window.location.href = link;
                 Swal.fire({
                     title: "Deleted!",
                     text: "Your file has been deleted.",
                     icon: "success"
                 });
             });

         })
     })
 </script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
     @if (Session::has('message'))
         var type = "{{ Session::get('alert-type', 'info') }}"
         switch (type) {
             case 'info':
                 toastr.info(" {{ Session::get('message') }} ");
                 break;

             case 'success':
                 toastr.success(" {{ Session::get('message') }} ");
                 break;

             case 'warning':
                 toastr.warning(" {{ Session::get('message') }} ");
                 break;

             case 'error':
                 toastr.error(" {{ Session::get('message') }} ");
                 break;
         }
     @endif
 </script>


 </body>

 </html>
