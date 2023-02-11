@props(["active" => ""])

<li class="{{ $active }}"><x-link href="#">{{ $slot }}</x-link></li>