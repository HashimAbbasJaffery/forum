                    @props(["genre" => "tags", "title" => "tags"])
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="{{ $genre }}">{{ ucwords($title) }}</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="{{ $genre }}">
                            <div {{ $attributes->merge(["class" => ""]) }}>
                            	{{ $slot }}
                            </div>
                        </div>
                    </div>
