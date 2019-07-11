
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
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms_assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('laracms_assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        LaraCMS
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('laracms_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('laracms_assets/css/paper-dashboard.css') }}?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('laracms_assets/demo/demo.css') }}" rel="stylesheet" />
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
                    <img src="{{ asset('laracms_assets/img/hightech_logo.png') }}" alt="">
                </div>
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Laracms
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{ asset('laracms_assets/img/faces/cartoon-rhino-8.gif') }}" />
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    @if(view()->exists('laracms.dashboard.partials.topnav'))
                        @include('laracms.dashboard.partials.topnav')
                    @else
                        @include('laracms.dashboard::partials.topnav')
                    @endif
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-globe text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Capacity</p>
                                        <p class="card-title">150GB
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh"></i> Update Now
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Revenue</p>
                                        <p class="card-title">$ 1,345
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar-o"></i> Last day
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-vector text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Errors</p>
                                        <p class="card-title">23
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> In the last hour
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-favourite-28 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Followers</p>
                                        <p class="card-title">+45K
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh"></i> Update now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="numbers pull-left">
                                        $34,657
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                      <span class="badge badge-pill badge-success">
                        +18%
                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="big-title">total earnings in last ten quarters</h6>
                            <canvas id="activeUsers" width="826" height="380"></canvas>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="footer-title">Financial Statistics</div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                                        <button class="btn btn-success btn-round btn-icon btn-sm">
                                            <i class="nc-icon nc-simple-add"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="numbers pull-left">
                                        169
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                      <span class="badge badge-pill badge-danger">
                        -14%
                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="big-title">total subscriptions in last 7 days</h6>
                            <canvas id="emailsCampaignChart" width="826" height="380"></canvas>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="footer-title">View all members</div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                                        <button class="btn btn-danger btn-round btn-icon btn-sm">
                                            <i class="nc-icon nc-button-play"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="numbers pull-left">
                                        8,960
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                      <span class="badge badge-pill badge-warning">
                        ~51%
                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="big-title">total downloads in last 6 years</h6>
                            <canvas id="activeCountries" width="826" height="380"></canvas>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="footer-title">View more details</div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pull-right">
                                        <button class="btn btn-warning btn-round btn-icon btn-sm">
                                            <i class="nc-icon nc-alert-circle-i"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Global Sales by Top Locations</h4>
                            <p class="card-category">All products that were shipped</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/US.png') }}">
                                                    </div>
                                                </td>
                                                <td>USA</td>
                                                <td class="text-right">
                                                    2.920
                                                </td>
                                                <td class="text-right">
                                                    53.23%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/DE.png') }}">
                                                    </div>
                                                </td>
                                                <td>Germany</td>
                                                <td class="text-right">
                                                    1.300
                                                </td>
                                                <td class="text-right">
                                                    20.43%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/AU.png') }}">
                                                    </div>
                                                </td>
                                                <td>Australia</td>
                                                <td class="text-right">
                                                    760
                                                </td>
                                                <td class="text-right">
                                                    10.35%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/GB.png') }}">
                                                    </div>
                                                </td>
                                                <td>United Kingdom</td>
                                                <td class="text-right">
                                                    690
                                                </td>
                                                <td class="text-right">
                                                    7.87%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/RO.png') }}">
                                                    </div>
                                                </td>
                                                <td>Romania</td>
                                                <td class="text-right">
                                                    600
                                                </td>
                                                <td class="text-right">
                                                    5.94%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{ asset('laracms_assets/img/flags/BR.png') }}">
                                                    </div>
                                                </td>
                                                <td>Brasil</td>
                                                <td class="text-right">
                                                    550
                                                </td>
                                                <td class="text-right">
                                                    4.34%
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 ml-auto mr-auto">
                                    <div id="worldMap" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">Tasks</h4>
                            <h5 class="card-category">Backend development</h5>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="img-row">
                                            <div class="img-wrapper">
                                                <img src="{{ asset('laracms_assets/img/faces/ayo-ogunseinde-2.jpg') }}" class="img-raised" />
                                            </div>
                                        </td>
                                        <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="nc-icon nc-ruler-pencil"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="img-row">
                                            <div class="img-wrapper">
                                                <img src="{{ asset('laracms_assets/img/faces/erik-lucatero-2.jpg') }}" class="img-raised" />
                                            </div>
                                        </td>
                                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="nc-icon nc-ruler-pencil"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="img-row">
                                            <div class="img-wrapper">
                                                <img src="{{ asset('laracms_assets/img/faces/kaci-baum-2.jpg') }}" class="img-raised" />
                                            </div>
                                        </td>
                                        <td class="text-left">Using dummy content or fake information in the Web design process can result in products with unrealistic
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="nc-icon nc-ruler-pencil"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="img-row">
                                            <div class="img-wrapper">
                                                <img src="{{ asset('laracms_assets/img/faces/joe-gardner-2.jpg') }}" class="img-raised" />
                                            </div>
                                        </td>
                                        <td class="text-left">But I must explain to you how all this mistaken idea of denouncing pleasure</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="nc-icon nc-ruler-pencil"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                <i class="nc-icon nc-simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh spin"></i> Updated 3 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">2018 Sales</h4>
                            <p class="card-category">All products including Taxes</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartActivity"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Tesla Model S
                                <i class="fa fa-circle text-danger"></i> BMW 5 Series
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> Data information certified
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Email Statistics</h5>
                            <p class="card-category">Last Campaign Performance</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartDonut1" class="ct-chart ct-perfect-fourth" width="456" height="300"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar"></i> Number of emails sent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">New Visitators</h5>
                            <p class="card-category">Out Of Total Number</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartDonut2" class="ct-chart ct-perfect-fourth" width="456" height="300"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-warning"></i> Visited
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> Campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Orders</h5>
                            <p class="card-category">Total number</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartDonut3" class="ct-chart ct-perfect-fourth" width="456" height="300"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-danger"></i> Completed
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Updated 3 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Subscriptions</h5>
                            <p class="card-category">Our Users</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="chartDonut4" class="ct-chart ct-perfect-fourth" width="456" height="300"></canvas>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-secondary"></i> Ended
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Total users
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<script src="{{ asset('laracms_assets/js/plugins/sweetalert2.min.js') }}"></script>
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
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('laracms_assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('laracms_assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('laracms_assets/js/paper-dashboard.min.js') }}?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('laracms_assets/demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js') }}
        demo.initDashboardPageCharts();


        demo.initVectorMap();

    });
</script>
</body>

</html>


{{--<!doctype html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
    {{--<meta charset="utf-8"/>--}}
    {{--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('laracms_assets/img/apple-icon.png') }}">--}}
    {{--<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('laracms_assets/img/favicon.png') }}">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>LaraCMS</title>--}}

    {{--<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>--}}
    {{--<meta name="viewport" content="width=device-width"/>--}}

    {{--<!-- Bootstrap core CSS     -->--}}
    {{--<link href="{{ asset('laracms_assets/css/bootstrap.min.css') }}') }}" rel="stylesheet"/>--}}

    {{--<!-- Animation library for notifications   -->--}}
    {{--<link href="{{ asset('laracms_assets/css/animate.min.css') }}') }}" rel="stylesheet"/>--}}

    {{--<!--  Paper Dashboard core CSS    -->--}}
    {{--<link href="{{ asset('laracms_assets/css/paper-dashboard.css') }}') }}" rel="stylesheet"/>--}}


    {{--<!--  CSS for Demo Purpose, don't include it in your project     -->--}}
    {{--<link href="{{ asset('laracms_assets/css/demo.css') }}') }}" rel="stylesheet"/>--}}

    {{--<!--  Fonts and icons     -->--}}
    {{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" rel="stylesheet">--}}
    {{--<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>--}}
    {{--<link href="{{ asset('laracms_assets/css/themify-icons.css') }}') }}" rel="stylesheet">--}}

    {{--@yield('styles')--}}

{{--</head>--}}
{{--<body>--}}
{{--<div class="wrapper">--}}
    {{--<div class="sidebar" data-background-color="black" data-active-color="info">--}}

        {{--<div class="sidebar-wrapper">--}}
            {{--<div class="logo">--}}
                {{--<a href="{{ route('laracms.dashboard') }}" class="simple-text">--}}
                    {{--<img width="50" src="{{ asset('laracms_assets/img/hightech_logo.png') }}" alt="">--}}
                    {{--LaraCMS--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<ul class="nav">--}}
                {{--@foreach(config('laracms.menu') as $menuPoint)--}}
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
                        {{--<li class="{{ activeRoute($menuPoint['url'] . '*') }}">--}}
                            {{--<a href="{{ Route::has($menuPoint['url']) ? route($menuPoint['url']) : $menuPoint['url'] }}">--}}
                                {{--{!! $menuPoint['icon'] !!}--}}
                                {{--<p>{{ __($menuPoint['translation_key']) }}</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
                {{--<li class="active-pro">--}}
                    {{--<a href="mailto:info@hightech.lv">--}}
                        {{--<i class="ti-help"></i>--}}
                        {{--<p>{{ __('laracms::support') }}</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="main-panel">--}}

        {{--@if (session('status'))--}}
            {{--<div class="alert alert-success">--}}
                {{--{{ session('status') }}--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--@include('laracms.breadcrumbs::links')--}}

        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--<nav class="navbar navbar-default">--}}
            {{--<div class="container-fluid">--}}
                {{--@if(isset($page))--}}
                    {{--<div class="navbar-header">--}}
                        {{--<button type="button" class="navbar-toggle">--}}
                            {{--<span class="sr-only">Toggle navigation</span>--}}
                            {{--<span class="icon-bar bar1"></span>--}}
                            {{--<span class="icon-bar bar2"></span>--}}
                            {{--<span class="icon-bar bar3"></span>--}}
                        {{--</button>--}}
                        {{--<a class="navbar-brand" href="#">{{ $page }}</a>--}}
                    {{--</div>--}}
                {{--@endif--}}

                {{--@if(view()->exists('laracms.dashboard.partials.topnav'))--}}
                    {{--@include('laracms.dashboard.partials.topnav')--}}
                {{--@else--}}
                    {{--@include('laracms.dashboard::partials.topnav')--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--<div class="content">--}}
            {{--<div class="container-fluid">--}}
                {{--@yield('content')--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<footer class="footer">--}}
            {{--<div class="container-fluid">--}}
                {{--<nav class="pull-left">--}}
                    {{--<ul>--}}

                        {{--<li>--}}
                            {{--<a href="https://github.com/grundmanis/laracms">--}}
                                {{--Wiki--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="https://github.com/grundmanis/laracms">--}}
                                {{--Github--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
                {{--<div class="copyright pull-right">--}}
                    {{--© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

    {{--</div>--}}
{{--</div>--}}


{{--</body>--}}

{{--<!--   Core JS Files   -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js') }}"></script>--}}
{{--<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js') }}"></script>--}}

{{--<!--  Checkbox, Radio & Switch Plugins -->--}}
{{--<script src="{{ asset('laracms_assets/js/bootstrap-checkbox-radio.js') }}') }}"></script>--}}

{{--<!--  Charts Plugin -->--}}
{{--<script src="{{ asset('laracms_assets/js/chartist.min.js') }}') }}"></script>--}}

{{--<!--  Notifications Plugin    -->--}}
{{--<script src="{{ asset('laracms_assets/js/bootstrap-notify.js') }}') }}"></script>--}}

{{--<!--  Google Maps Plugin    -->--}}
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--}}

{{--<!-- Paper Dashboard Core javascript and methods for Demo purpose -->--}}
{{--<script src="{{ asset('laracms_assets/js/paper-dashboard.js') }}') }}"></script>--}}

{{--<!-- Paper Dashboard DEMO methods, don't include it in your project! -->--}}
{{--<script src="{{ asset('laracms_assets/js/demo.js') }}') }}"></script>--}}

{{--@yield('scripts')--}}

{{--</html>--}}