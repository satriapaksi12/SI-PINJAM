<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="tmp_dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="tmp_dashboard/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="tmp_dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="tmp_dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="tmp_dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="tmp_dashboard/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="tmp_dashboard/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="tmp_dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="tmp_dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="tmp_dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="tmp_dashboard/plugins/moment/moment.min.js"></script>
    <script src="tmp_dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="tmp_dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="tmp_dashboard/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="tmp_dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="tmp_dashboard/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="tmp_dashboard/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="tmp_dashboard/dist/js/pages/dashboard.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="tmp_dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="tmp_dashboard/plugins/jszip/jszip.min.js"></script>
    <script src="tmp_dashboard/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="tmp_dashboard/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="tmp_dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="tmp_dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>

</html>
