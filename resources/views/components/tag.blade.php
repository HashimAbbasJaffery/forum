
@props(["href" => "#"])
<a href="?{{ http_build_query(request()->except('tag')) }}&tag={{ $slot }}" {{ $attributes->merge(["class" => ""]) }}>{{ $slot }}</a>