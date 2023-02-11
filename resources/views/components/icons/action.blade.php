                                   		@props(["href" => "#"])
                                   		<div> 
                                            <a href="{{ $href }}"><i {{ $attributes->merge(["class" => ""]) }}></i></a>
                                            <span>{{ $slot }}</span>
                                        </div>