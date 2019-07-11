@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.dashboard')] )

@section('content')
    <div class="content">
        @if(view()->exists('laracms.dashboard.content'))
            @include('laracms.dashboard.content')
        @else
            @include('laracms.dashboard::content')
        @endif
    </div>
@endsection

@section('scripts')
@endsection
