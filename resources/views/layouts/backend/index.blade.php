<!DOCTYPE  html>
<html lang="es" ng-app="app">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('tim/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ URL::asset('tim/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Varitec</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('tim/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ URL::asset('tim/css/material-dashboard.css?v=1.2.1') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, dont include it in your project     -->
    <link href="{{ URL::asset('tim/css/demo.css') }}" rel="stylesheet" />
    @stack('css')
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
{{--
<link rel="stylesheet" href="{{ URL::asset('/bower_components/angular-datatables/dist/css/angular-datatables.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/bower_components/datatables.net-dt/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/bower_components/angular-bootstrap/ui-bootstrap-csp.css') }}">
--}}
</head>

<style>
    * {font-size: 11px}
    .sidebar .nav p {
        font-size: 11px;}

</style>

<!--

.nav>li>a {
    padding: 0px 5px;
}

.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 5px;
    margin-bottom: 1px;
}

.form-control {
    height: 30px;
    padding: 5px 0;
    font-size: 12px;
    line-height: 0;
}


table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {

    font-size: 12px;
}

.table>thead>tr>th {
    font-size: 1.10em;
    font-weight: 400;
}
</style>
-->


<body>
    <div class="wrapper">

        @if(Auth::user()->rol_id == 1)
            @include('layouts.backend.sidebar_admin')
        @elseif(Auth::user()->rol_id == 2)
            @include('layouts.backend.sidebar_admin')
        @endif


        <div class="main-panel">

            @include('layouts.backend.header')

            <div class="content">
                <div class="container-fluid" style="min-height: 450px;">

                    @yield('content')

                </div>
            </div>

            @include('layouts.backend.footer')

        </div>
    </div>
<!--   Core JS Files   -->
{{-- <script src="{{ URL::asset('tim/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ URL::asset('tim/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('tim/js/material.min.js') }}" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}
<!--  Charts Plugin -->
<script src="{{ URL::asset('tim/js/chartist.min.js') }}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ URL::asset('tim/js/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ URL::asset('tim/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ URL::asset('tim/js/bootstrap-notify.js') }}"></script>
<!-- Material Dashboard DEMO methods, dont include it in your project -->
<script src="{{ URL::asset('tim/js/demo.js') }}"></script>

<!-- Forms Validations Plugin -->
<script src="{{ URL::asset('tim/js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ URL::asset('tim/js/moment.min.js') }}"></script>

<!--   Sharrre Library
<script src="{{ URL::asset('tim/js/jquery.sharrre.js') }}"></script>-->
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ URL::asset('tim/js/bootstrap-datepicker.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ URL::asset('tim/js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ URL::asset('tim/js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ URL::asset('tim/js/sweetalert2.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ URL::asset('tim/js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ URL::asset('tim/js/fullcalendar.min.js') }}"></script>
{{--
<script src="{{ URL::asset('/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/bower_components/angular/angular.min.js') }}"></script>
<script src="{{ URL::asset('/bower_components/angular-datatables/dist/angular-datatables.min.js') }}"></script>

<script src="{{ URL::asset('/bower_components/angular-bootstrap/ui-bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js') }}"></script>
 Angular Controllers

  <script src="{{ URL::asset('/angularController/appController.js') }}"></script>--}}




   @stack('js')
<!-- END JAVASCRIPTS -->


</body>

</html>