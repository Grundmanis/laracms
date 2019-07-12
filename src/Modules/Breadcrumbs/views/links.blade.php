<ol class="breadcrumb" style="margin-bottom: 0;">
    @foreach($segments as $key => $segment)
        <li>
            @if ($segmentCount != $key)
                <a class="text-info" href="{{ $url .= $segment . '/' }}">{{ ucfirst($segment) }}</a>&nbsp;/&nbsp;
            @else
                 {{ ucfirst($segment) }}
            @endif
        </li>
    @endforeach
</ol>