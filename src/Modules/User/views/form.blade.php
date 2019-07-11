@extends('laracms.dashboard::layouts.app', ['page' => __('laracms::admin.profile')])

@section('content')
    <div class="row">
        <div class="col-sm-8 col-md-4">
            <form method="POST">
                {{ csrf_field() }}
                <table class="table">
                    <tr>
                        <td>{{ __('laracms::admin.email') }}</td>
                        <td>
                            <input type="text" name="email" value="{{ formValue($user ?? null, 'email') }}"
                                   class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('laracms::admin.name') }}</td>
                        <td>
                            <input type="text" name="name" value="{{ formValue($user ?? null, 'name') }}"
                                   class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('laracms::admin.password') }}</td>
                        <td>
                            <input type="password" name="password" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">
                            <button class="btn btn-success">{{ __('laracms::admin.save') }}</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
