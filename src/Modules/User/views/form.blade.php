@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.laracms_users')] )

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.laracms_users') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">{{ __('laracms::admin.email') }}</label>
                    <input id="email" type="text" name="email" value="{{ formValue($user ?? null, 'email') }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">{{ __('laracms::admin.name') }}</label>
                    <input id="name" type="text" name="name" value="{{ formValue($user ?? null, 'name') }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('laracms::admin.password') }}</label>
                    <input id="password" type="password" name="password" value="{{ formValue($user ?? null, 'password') }}"
                           class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('laracms::admin.save') }}</button>
    </form>
@endsection
