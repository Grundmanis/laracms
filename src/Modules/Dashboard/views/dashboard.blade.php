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
    <script type="text/javascript">
        {{--$(document).ready(function(){--}}

            {{--$.notify({--}}
                {{--icon: 'ti-gift',--}}
                {{--message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."--}}

            {{--},--}}
                {{--{--}}
                {{--type: 'success',--}}
                {{--timer: 4000--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}
@endsection
