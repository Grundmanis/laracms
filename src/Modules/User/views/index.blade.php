@extends('laracms.dashboard::layouts.app')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Pages</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">

            <h1 class="page-header">Laracms Users</h1>
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('laracms.users.create') }}">Create</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>e-mail</th>
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
                                <a href="{{ route('laracms.users.edit', $user->id) }}">Edit</a>
                                |
                                <a onclick="return confirm('Are you sure?')"
                                   href="{{ route('laracms.users.destroy', $user->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
