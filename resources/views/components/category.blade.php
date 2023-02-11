@props(["href" => "#", "list" => ""])
@php
    $href = str_replace("&amp;", "&", $href);
@endphp
<li class="col-xs-6 {{ $list }}"><a href="{{ $href }}" class="categories" category-data="{{ $href }}" class="category"><i  {{ $attributes->merge(["class" => ""]) }}></i>{{ $slot }}</a></li>