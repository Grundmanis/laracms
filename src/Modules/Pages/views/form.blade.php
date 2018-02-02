@extends('laracms.dashboard::layouts.app')

@section('styles')

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('scripts')
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>

    <script> $(function() { $('textarea').froalaEditor() }); </script>
@endsection

@section('content')
    <form method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="slug">URL<span>*</span></label>
            <input value="{{ formValue($page ?? null, 'url') }}" name="url" class="form-control" id="url" placeholder="about or faq or whatever">
            <small id="url" class="form-text text-muted">This url will be shown in address bar</small>
        </div>

        <div class="form-group">
            <label for="slug">Layout<span>*</span></label>
            <select class="form-control" name="layout" id="layout">
                @foreach($layouts as $layout)
                    <option @if(formValue($page ?? null, 'layout') == $layout) selected @endif value="{{ $layout }}">
                        {{ $layout }}
                    </option>
                @endforeach
            </select>
            <small id="layout" class="form-text text-muted">Layouts are located in <strong>resources/views/laracms/pages/layouts</strong></small>
        </div>

        <!-- Nav tabs -->
        <div class="form-group">
            <ul class="nav nav-tabs" role="tablist">
                @foreach(config('translatable.locales') as $key => $locale)
                    <li role="presentation" @if(!$key) class="active" @endif>
                        <a href="#{{ $locale }}" data-toggle="tab">
                            {{ $locale }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <label title="value">Text*</label>

            @foreach(config('translatable.locales') as $key => $locale)
                <div class="tab-pane @if(!$key) active @endif" id="{{ $locale }}">
                    <div class="form-group">
                        <textarea name="{{ $locale }}[text]">
                            {{ formValue($page ?? null, 'text', $locale) }}
                        </textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection