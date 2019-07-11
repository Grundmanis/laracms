@extends(view()->exists('laracms.dashboard.layouts.auth') ? 'laracms.dashboard.layouts.auth' : 'laracms.dashboard::layouts.auth')

@section('content')
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('laracms.login') }}">
            {{ csrf_field() }}
            <div class="card card-login">
                <div class="card-header ">
                    <div class="card-header ">
                        <h3 class="header text-center">{{ __('laracms::admin.login') }}</h3>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                        </div>
                        <input name="email" type="text" class="form-control" placeholder="{{ __('laracms::admin.email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-key-25"></i>
                      </span>
                        </div>
                        <input type="password" name="password" placeholder="{{ __('laracms::admin.password') }}" class="form-control">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                {{ __('laracms::admin.remember_me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-warning btn-round btn-block mb-3">{{ __('laracms::admin.login') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
