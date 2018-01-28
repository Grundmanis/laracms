@extends('laracms.dashboard::layouts.app')

@section('content')
    <h1 class="page-header">Content management</h1>
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.content.create') }}">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Slug</th>
                    <th>Text</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->slug }}</td>
                        <td>{{ $content->value }}</td>
                        <td>
                            <a href="{{ route('laracms.content.edit', $content->id) }}">Edit</a>
                            |
                            <a onclick="return confirm('Are you sure?')" href="{{ route('laracms.content.destroy', $content->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contents->links() }}
    </div>
@endsection
