@extends('laracms.dashboard::layouts.app', ['page' => __('texts.profile')])

@section('content')
    <div class="row">
        <div class="col-sm-4 col-md-2">
            <img width="210" src="https://materiell.com/wp-content/uploads/2015/03/doug_full1.png" alt="avatar">
        </div>
        <div class="col-sm-8 col-md-4">
            <form method="POST">
                {{ csrf_field() }}
                <table class="table table-bordered">
                    <tr>
                        <td>{{ __('texts.email') }}</td>
                        <td>
                            <input type="text" name="email" value="{{ formValue($user ?? null, 'email') }}"
                                   class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('texts.name') }}</td>
                        <td>
                            <input type="text" name="name" value="{{ formValue($user ?? null, 'name') }}"
                                   class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('texts.password') }}</td>
                        <td>
                            <input type="password" name="password" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">
                            <button class="btn btn-success">{{ __('texts.save') }}</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
