<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms_assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('laracms_assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraCMS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('laracms_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{ asset('laracms_assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('laracms_assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('laracms_assets/css/demo.css') }}" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('laracms_assets/css/themify-icons.css') }}" rel="stylesheet">

    @yield('styles')

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="info">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('laracms.dashboard') }}" class="simple-text">
                    LaraCMS
                </a>
            </div>

            <ul class="nav">
                @foreach(config('laracms.menu') as $menuPoint)
                    {{--@if (is_array($link))--}}
                        {{--<li class="dropdown {{ activeRoute(array_first($link) . '*') ? 'active open' : '' }}">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                               {{--aria-haspopup="true" aria-expanded="false">--}}
                                {{--{{ ucfirst($menu) }} <span class="caret"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--@foreach($link as $subMenu => $subLink)--}}
                                    {{--<li class="{{ activeRoute($subLink) }}">--}}
                                        {{--<a href="{{ Route::has($subLink) ? route($subLink) : $subLink }}">--}}
                                            {{--{{ ucfirst(__($subMenu)) }}--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@else--}}
                        <li class="{{ activeRoute($menuPoint['url'] . '*') }}">
                            <a href="{{ Route::has($menuPoint['url']) ? route($menuPoint['url']) : $menuPoint['url'] }}">
                                {!! $menuPoint['icon'] !!}
                                <p>{{ __($menuPoint['translation_key']) }}</p>
                            </a>
                        </li>
                    {{--@endif--}}
                @endforeach
                <li class="active-pro">
                    <a href="mailto:info@hightech.lv">
                        <i class="ti-help"></i>
                        <p>{{ __('laracms::support') }}</p>
                    </a>
                </li>
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

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                @if(isset($page))
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">{{ $page }}</a>
                    </div>
                @endif

                @if(view()->exists('laracms.dashboard.partials.topnav'))
                    @include('laracms.dashboard.partials.topnav')
                @else
                    @include('laracms.dashboard::partials.topnav')
                @endif
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="https://github.com/grundmanis/laracms">
                                Wiki
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/grundmanis/laracms">
                                Github
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('laracms_assets/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('laracms_assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('laracms_assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--}}

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('laracms_assets/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('laracms_assets/js/demo.js') }}"></script>

@yield('scripts')

</html>