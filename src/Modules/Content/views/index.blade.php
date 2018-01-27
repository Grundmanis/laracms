@extends('laracms::app')

@section('content')
    <h1 class="page-header">Content management</h1>
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
            <tr>
                <td>1</td>
                <td>terms</td>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam assumenda ducimus fuga in laudantium minima reprehenderit! In, optio, ullam.
                </td>
                <td>
                    <a href="{{ route('laracms.content.edit', 1) }}">Edit</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>terms</td>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam assumenda ducimus fuga in laudantium minima reprehenderit! In, optio, ullam.
                </td>
                <td>
                    <a href="{{ route('laracms.content.edit', 1) }}">Edit</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>terms</td>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam assumenda ducimus fuga in laudantium minima reprehenderit! In, optio, ullam.
                </td>
                <td>
                    <a href="{{ route('laracms.content.edit', 1) }}">Edit</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
