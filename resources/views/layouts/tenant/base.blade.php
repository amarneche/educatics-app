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
        {{-- <div id="loader"></div> --}}
        @include("layouts.tenant.header")
        @include("layouts.tenant.aside")


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        @include('layouts.tenant.sidebar')
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    @yield('modals')

    @include('tenant.toasts.toasts')
    <!-- ./wrapper -->

    <!-- ./side demo panel -->

    <!-- Sidebar -->



    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="{{ global_asset('js/vendors.min.js') }}"></script>
    <script src="{{ global_asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ global_asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
    <script src="{{global_asset("assets/vendor_components/jquery-toast-plugin-master/dist/jquery.toast.min.js")}}" ></script>

    <!-- EduAdmin App -->
    <script src="{{ global_asset('js/template.js') }}"></script>
    {{-- <script src="{{global_asset("js/pages/dashboard.js")}}"></script> --}}
    {{-- <script src="{{global_asset("js/pages/calendar.js")}}"></script> --}}

    {{-- Custom scripts --}}

    @yield('scripts')

</body>

</html>
