@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.users')] )

@section('content')
    <form method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.menu.users') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                            <img src="{{ isset($user) && $user->avatar ? asset('storage/' . $user->avatar) : asset('laracms_assets/img/placeholder.jpg') }}" alt="avatar">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                        <span class="btn btn-round btn-rose btn-file">
                          <span class="fileinput-new">{{ __('laracms::admin.add_photo') }}</span>
                          <span class="fileinput-exists">{{ __('laracms::admin.change') }}</span>
                          <input type="file" name="avatar" />
                        </span>
                            <br />
                            <a href="javascript:void(0)" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> {{ __('laracms::admin.add_photo') }}</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('laracms::admin.email') }}</label>
                    <input id="email" @if(isset($edit)) disabled @endif type="text" name="email" value="{{ formValue($user ?? null, 'email') }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">{{ __('laracms::admin.name') }}</label>
                    <input id="name" type="text" name="name" value="{{ formValue($user ?? null, 'name') }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('laracms::admin.password') }}</label>
                    <input autocomplete="false"  id="password" type="password" name="password"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('laracms::admin.password_confirmation') }}</label>
                    <input autocomplete="false"  id="password_confirmation" type="password" name="password_confirmation"
                           class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('laracms::admin.save') }}</button>
    </form>
@endsection
