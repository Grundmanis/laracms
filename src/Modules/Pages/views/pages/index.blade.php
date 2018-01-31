@extends('laracms.pages::pages.layouts.' . $page->layout)

@section('content')
    <div class="container">
        {!! $page->text !!}
    </div>
@endsection
