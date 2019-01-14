<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="/" class="dropdown-toggle">
                <i class="ti-panel"></i>
                <p>{{ __('admin.open_website') }}</p>
            </a>
        </li>
        <li>
            <a href="{{ route('laracms.users.edit', Auth::guard('laracms')->user()->id) }}">
                <i class="ti-panel"></i>
                <p>{{ __('admin.my_profile') }}</p>
            </a>
        </li>
        {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="ti-bell"></i>--}}
                {{--<p class="notification">5</p>--}}
                {{--<p>Notifications</p>--}}
                {{--<b class="caret"></b>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="#">Notification 1</a></li>--}}
                {{--<li><a href="#">Notification 2</a></li>--}}
                {{--<li><a href="#">Notification 3</a></li>--}}
                {{--<li><a href="#">Notification 4</a></li>--}}
                {{--<li><a href="#">Another notification</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li>
            <a href="{{ route('laracms.logout') }}">
                <i class="ti-settings"></i>
                <p>{{ __('admin.logout') }}</p>
            </a>
        </li>
    </ul>

</div>