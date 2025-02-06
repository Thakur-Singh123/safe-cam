@include('admin.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="{{ asset('public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
               <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" style="text-decoration: none;">
               <img src="{{ url('public/uploads/users/'.auth()->user()->avatar) }}" alt="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="user_image" style="width:30px; height:30px; margin-right:10px;">
               <span style="font-weight: normal; color: #333;">{{ auth()->user()->name }}</span>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <div class="dropdown-divider"></div>
                  <a href="{{ url('admin/edit-profile') }}" class="dropdown-item">
                  <i class="fas fa-user mr-2"></i> View Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ url('admin/change-password') }}" class="dropdown-item">
                  <i class="fas fa-key mr-2"></i> Change Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt mr-2"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
               </div>
            </li>
         </ul>
      </nav>
      @include('admin.sidebar.admin-sidebar')
      @yield('content')
      <footer class="main-footer">
         <strong>Pixxelu &copy; 2014-2025</strong>
         All rights reserved.
         <div class="float-right d-none d-sm-inline-block">
         </div>
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
   </div>
   <script>
     var base_url = "{{ url('/') }}";
      </script>
   <!--custom-scrip-->
   <script src="{{ asset('public/js/custom-script.js') }}"></script>
   <!--jquery-->
   <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/select2/js/select2.full.min.js') }}"></script>
   <!--datatables js-->
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   <script>
   $(document).ready(function() {
      $('#slider_id').DataTable();
   });

   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  });
   </script>
   <!--jquery ui 1.11.4-->
   <script src="{{ asset('public/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>

   <script src="{{ asset('public/js/custom-ajax.js') }}"></script>
   <!--bootstrap 4-->
   <script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <!--chartjs-->
   <script src="{{ asset('public/admin/plugins/chart.js/Chart.min.js') }}"></script>
   <!--sparkline-->
   <script src="{{ asset('public/admin/plugins/sparklines/sparkline.js') }}"></script>
   <!--jqvmap-->
   <script src="{{ asset('public/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
   <!--jquery knob chart-->
   <script src="{{ asset('public/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
   <!--daterangepicker-->
   <script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <!--tempusdominus bootstrap 4-->
   <script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
   <!--summernote-->
   <script src="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
   <!--overlayscrollbars-->
   <script src="{{ asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
   <!--admin app-->
   <script src="{{ asset('public/admin/dist/js/adminlte.js') }}"></script>
   <!--admin for demo purposes-->
   <!--<script src="{{ asset('public/admin/dist/js/demo.js') }}"></script>-->
   <!--admin dashboard demo (This is only for demo purposes)-->
   <script src="{{ asset('public/admin/dist/js/pages/dashboard.js') }}"></script>
   <!--sweetalert js-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
   <script>
   //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y-M-D'
    });
    $('#reservationdates').datetimepicker({
        format: 'Y-M-D'
    });
   </script>
</body>
</html>