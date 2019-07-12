<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link btn-magnify" href="{{ env('APP_URL') }}">
            <i class="nc-icon nc-layout-11"></i>
            <p>
                <span class="d-lg-none d-md-block">{{ __('laracms::admin.open_website') }}</span>
            </p>
        </a>
    </li>
    <li class="nav-item btn-rotate dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ App::getLocale() }}
            {{--<i class="nc-icon nc-bell-55"></i>--}}
            <p>
                <span class="d-lg-none d-md-block">{{ App::getLocale() }}</span>
            </p>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            @foreach($locales as $locale)
                <a class="dropdown-item" href="{{ route('laracms.dashboard', ['lng' => $locale]) }}">{{ $locale }}</a>
            @endforeach
        </div>
    </li>
</ul>