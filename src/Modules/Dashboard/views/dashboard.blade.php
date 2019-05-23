@extends('laracms.dashboard::layouts.app', ['page' => __('admin.menu.dashboard')] )
@section('content')
    <div class="content">
        <div class="container-fluid">
            {{ __('admin.example_text') }}
        </div>
    </div>
@endsection

@section('scripts')
    <!--  Charts Plugin -->
    <script src="{{ asset('laracms_assets/js/chartist.min.js') }}"></script>
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
@endsection
