@props(["icon", "href" => "#"])
<a href="{{ $href }}" class="btn"><i class="{{ $icon }}"></i>{{ $slot }}</a>
{{-- icon-Bookmark --}}