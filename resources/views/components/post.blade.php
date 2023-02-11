<div class="posts__item bg-f2f4f6">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="/question/{{ $question->slug }}">
                                        <h3>{{ $question->title }}</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        @foreach($question->tags as $tag)
                                            <x-tag href="/tag/{{ $tag->name }}" class="bg-a3d39c">{{ $tag->name }}</x-tag>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="?{{ http_build_query(request()->except("category")) }}&category={{ $question->category->slug }}" class="category"><i class="bg-a7cdbd"></i> {{ $question->category->name }}</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                 @forelse ($question->comments as $comment)
                                    @if($loop->iteration > 3) @break @endif
                                    <x-details 
                                        href="/profile/{{ $comment->user->username }}"
                                        :user="$comment->user_id" 
                                        :letter="$comment->user->name[0] ?? 'A'"
                                    />
                                @empty
                                    <p>No Comments</p>
                                @endforelse
                            </div>
                            <div class="posts__replies">{{ count($question->comments) }}</div>
                        </div>
                    </div>