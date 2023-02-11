
@props(["href" => "#"])
{{-- @dd($href) --}}
@php
    $href = str_replace("&amp;", "&", $href);
@endphp
<a class="tag-buttons" data-url="{{ $href }}" style="color: white" href="{{ $href }}" {{ $attributes->merge(["class" => ""]) }}>{{ $slot }}</a>