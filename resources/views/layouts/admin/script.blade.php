<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('template/base-admin-new/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('template/base-admin-new/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('template/base-admin-new/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/base-admin-new/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/dataTables.select.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('template/base-admin-new/js/off-canvas.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/template.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/settings.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('template/base-admin-new/js/dashboard.js')}}"></script>
<script src="{{asset('template/base-admin-new/js/Chart.roundedBarCharts.js')}}"></script>

@yield('script')