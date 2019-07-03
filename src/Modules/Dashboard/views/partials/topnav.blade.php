<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="ti-world"></i>
                <p>{{ App::getLocale() }}</p>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                @foreach($locales as $locale)
                    <li><a href="{{ route('laracms.dashboard', ['lng' => $locale]) }}">{{ $locale }}</a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="/" class="dropdown-toggle">
                <i class="ti-file"></i>
                <p>{{ __('laracms::admin.open_website') }}</p>
            </a>
        </li>
        <li>
            <a href="{{ route('laracms.users.edit', Auth::guard('laracms')->user()->id) }}">
                <i class="ti-user"></i>
                <p>{{ __('laracms::admin.my_profile') }}</p>
            </a>
        </li>
        <li>
            <a href="{{ route('laracms.logout') }}">
                <i class="ti-power-off"></i>
                <p>{{ __('laracms::admin.logout') }}</p>
            </a>
        </li>
    </ul>

</div>