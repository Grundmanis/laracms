<ol class="breadcrumb">
    @foreach($segments as $key => $segment)
        <li>
            @if ($segmentCount != $key)
                <a href="{{ $url .= $segment . '/' }}">{{ ucfirst($segment) }}</a>
            @else
                {{ ucfirst($segment) }}
            @endif
        </li>
    @endforeach
</ol>