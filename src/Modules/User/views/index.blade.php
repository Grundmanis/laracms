@extends('laracms.dashboard::layouts.app', ['page' => __('texts.laracms_users')])

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.users.create') }}">{{ __('texts.create') }}</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('texts.name') }}</th>
                <th>{{ __('texts.email') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('laracms.users.edit', $user->id) }}">{{ __('texts.edit') }}</a>
                        |
                        <a onclick="return confirm('Are you sure?')"
                           href="{{ route('laracms.users.destroy', $user->id) }}">{{ __('texts.delete') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
