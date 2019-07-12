@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.dashboard')] )

@section('styles')
    <link href="{{ asset('laracms_assets/demo/demo.css') }}" rel="stylesheet"/>
@endsection

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
    <script src="{{ asset('laracms_assets/demo/demo.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js') }}
            demo.initDashboardPageCharts();
            demo.initVectorMap();
        });
    </script>
@endsection
