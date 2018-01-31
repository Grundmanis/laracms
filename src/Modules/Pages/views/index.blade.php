@extends('laracms.dashboard::layouts.app')

@section('content')
    <h1 class="page-header">Pages</h1>
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.pages.create') }}">Create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Url</th>
                    <th>Layout</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>
                            <a href="{{ $page->getLink() }}">
                                {{ $page->url }}
                            </a>
                        </td>
                        <td>
                            {{ $page->layout }}
                        </td>
                        <td>
                            <a href="{{ route('laracms.pages.edit', $page->id) }}">Edit</a>
                            |
                            <a onclick="return confirm('Are you sure?')" href="{{ route('laracms.pages.destroy', $page->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pages->links() }}
    </div>
@endsection
