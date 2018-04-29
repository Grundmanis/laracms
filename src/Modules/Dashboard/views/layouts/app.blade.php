<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('laracms/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Lara CMS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('laracms/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('laracms/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('laracms/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('laracms/css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('laracms/css/themify-icons.css') }}" rel="stylesheet">

    @yield('styles')

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    LaraCMS
                </a>
            </div>

            <ul class="nav">
                @foreach(MenuFacade::getMenu() as $menu => $link)
                    @if (is_array($link))
                        <li class="dropdown {{ activeRoute(array_first($link) . '*') ? 'active open' : '' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ ucfirst($menu) }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($link as $subMenu => $subLink)
                                    <li class="{{ activeRoute($subLink) }}">
                                        <a href="{{ route($subLink) }}">
                                            {{ ucfirst($subMenu) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="{{ activeRoute($link . '*') }}">
                            <a href="{{ route($link) }}">
                                {{ ucfirst($menu) }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="main-panel">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @include('laracms.breadcrumbs::links')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('laracms/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('laracms/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('laracms/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('laracms/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('laracms/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('laracms/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('laracms/js/demo.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

//        $.notify({
//            icon: 'ti-gift',
//            message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."
//
//        },{
//            type: 'success',
//            timer: 4000
//        });

    });
</script>
@yield('scripts')

</html>