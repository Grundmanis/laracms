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
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms_assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('laracms_assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        LaraCMS - {{ $page ?? '' }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('laracms_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('laracms_assets/css/paper-dashboard.css') }}?v=2.0.1" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    @yield('styles')
</head>

<body class="">

<div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="success">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{ asset('laracms_assets/img/ht.png') }}" alt="">
                </div>
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Laracms
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{ asset('laracms_assets/img/faces/kaci-baum-2.jpg') }}"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                      <span>
                          {{ Auth::guard('laracms')->user()->email }}
                          <b class="caret"></b>
                      </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('laracms.users.edit', Auth::guard('laracms')->user()->id) }}">
                                    <span class="sidebar-mini-icon">{{ strtoupper(substr(__('laracms::admin.my_profile'), 0, 1)) }}</span>
                                    <span class="sidebar-normal">{{ __('laracms::admin.my_profile') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('laracms.logout') }}">
                                    <span class="sidebar-mini-icon">{{ strtoupper(substr(__('laracms::admin.logout'), 0, 1)) }}</span>
                                    <span class="sidebar-normal">{{ __('laracms::admin.logout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                @foreach(config('laracms.menu') as $k => $menuPoint)
                    @if (is_array($menuPoint['url']))
                        <li>
                            <a data-toggle="collapse" href="#sub_{{ $k }}">
                                <i class="nc-icon nc-book-bookmark"></i>
                                <p>
                                    {{ __($menuPoint['translation_key']) }}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse " id="sub_{{ $k }}">
                                <ul class="nav">
                                    @foreach($menuPoint['url'] as $subMenuPoint)
                                        <li class="{{ activeRoute($subMenuPoint['url'] . '*') ? 'active' : '' }}">
                                            <a href="{{ Route::has($subMenuPoint['url']) ? route($subMenuPoint['url']) : $subMenuPoint['url'] }}">
                                                @if (!empty($subMenuPoint['icon']))
                                                    {!! $subMenuPoint['icon'] !!}
                                                @else
                                                    <span class="sidebar-mini-icon">{{ strtoupper(substr(__($subMenuPoint['translation_key']), 0, 1)) }}</span>
                                                @endif
                                                <span class="sidebar-normal"> {{ __($subMenuPoint['translation_key']) }} </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="{{ activeRoute($menuPoint['url'] . '*') ? 'active' : '' }}">
                            <a href="{{ Route::has($menuPoint['url']) ? route($menuPoint['url']) : $menuPoint['url'] }}">
                                {!! $menuPoint['icon'] !!}
                                <p>{{ __($menuPoint['translation_key']) }}</p>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-icon btn-round">
                            <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                            <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                        </button>
                    </div>
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    @include('laracms.breadcrumbs::links')
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    @if(view()->exists('laracms.dashboard.partials.top_nav'))
                        @include('laracms.dashboard.partials.top_nav')
                    @else
                        @include('laracms.dashboard::partials.top_nav')
                    @endif
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="https://github.com/grundmanis/laracms" target="_blank">Wiki</a>
                            </li>
                            <li>
                                <a href="https://github.com/grundmanis/laracms" target="_blank">Github</a>
                            </li>
                            <li>
                                <a href="mailto:info@hightech.lv">{{ __('laracms::admin.support') }}</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i>
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('laracms_assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('laracms_assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('laracms_assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('laracms_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('laracms_assets/js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Plugin for Sweet Alert -->
{{--<script src="{{ asset('laracms_assets/js/plugins/sweetalert2.min.js') }}"></script>--}}
<!-- Forms Validations Plugin -->
<script src="{{ asset('laracms_assets/js/plugins/jquery.validate.min.js') }}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('laracms_assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('laracms_assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('laracms_assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('laracms_assets/js/plugins/fullcalendar.min.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('laracms_assets/js/plugins/jquery-jvectormap.js') }}"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="{{ asset('laracms_assets/js/plugins/nouislider.min.js') }}"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chart JS -->
<script src="{{ asset('laracms_assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('laracms_assets/js/paper-dashboard.min.js') }}?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->

@if (\Session::has('status'))
    <script>
        $.notify({
            icon: "nc-icon nc-bell-55",
            message: "{{ \Session::get('status') }}"

        }, {
            type: 'success',
            timer: 8000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
@endif
@if ($errors->any())
    <script>
        $.notify({
            icon: "nc-icon nc-bell-55",
            message: "{{ $errors->first() }}"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    </script>
@endif
@yield('scripts')
</body>

</html>