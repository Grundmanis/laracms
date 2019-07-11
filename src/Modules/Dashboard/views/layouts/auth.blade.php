
<!--
=========================================================
Paper Dashboard 2 PRO - v2.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/paper-dashboard-2-pro
Copyright 2019 Creative Tim (https://www.creative-tim.com)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms_assets//img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('laracms_assets//img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        LaraCMS
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('laracms_assets//css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('laracms_assets//css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('laracms_assets//demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="login-page">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="{{ env('APP_URL') }}">LaraCMS</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ env('APP_URL') }}" class="nav-link">
                        <i class="nc-icon nc-layout-11"></i> {{ __('laracms::admin.open_website') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset('laracms_assets//img/bg/fabio-mangione.jpg') }}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">

                @yield('content')

            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('laracms_assets//js/core/jquery.min.js') }}"></script>
<script src="{{ asset('laracms_assets//js/core/popper.min.js') }}"></script>
<script src="{{ asset('laracms_assets//js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('laracms_assets//js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('laracms_assets//js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('laracms_assets//js/plugins/bootstrap-switch.js') }}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{ asset('laracms_assets//js/plugins/sweetalert2.min.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('laracms_assets//js/plugins/jquery.validate.min.js') }}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('laracms_assets//js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('laracms_assets//js/plugins/bootstrap-selectpicker.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('laracms_assets//js/plugins/bootstrap-datetimepicker.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('laracms_assets//js/plugins/jquery.dataTables.min.js') }}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('laracms_assets//js/plugins/bootstrap-tagsinput.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('laracms_assets//js/plugins/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('laracms_assets//js/plugins/fullcalendar.min.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('laracms_assets//js/plugins/jquery-jvectormap.js') }}"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="{{ asset('laracms_assets//js/plugins/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('laracms_assets//js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('laracms_assets//js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('laracms_assets//js/paper-dashboard.min.js') }}?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('laracms_assets//demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
</body>

</html>