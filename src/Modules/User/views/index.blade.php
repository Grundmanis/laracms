@extends('laracms.dashboard::layouts.app')

@section('content')
    <h1 class="page-header">Laracms Users</h1>
    <div class="form-group">
        {{--<a class="btn btn-success" href="{{ route('laracms.user.create') }}">Create</a>--}}
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>e-mail</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
