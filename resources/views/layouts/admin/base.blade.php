<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>EduAdmin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ global_asset('css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ global_asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ global_asset('css/skin_color.css') }}">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        
        @include("layouts.admin.header")
        @include("layouts.admin.aside")


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <div class="content-header">
                    @yield("breadcrumb")
                </div>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- ./side demo panel -->

    <!-- Sidebar -->

    @yield('modals')
    @include('layouts.modals.delete')

    @include('layouts.toasts.toasts')

    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="{{ asset('js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>


    <!-- EduAdmin App -->
    <script src="{{ asset('js/template.js') }}"></script>
    {{-- <script src="{{asset("js/pages/dashboard.js")}}"></script> --}}
    {{-- <script src="{{asset("js/pages/calendar.js")}}"></script> --}}

    @yield('scripts')

</body>

</html>
