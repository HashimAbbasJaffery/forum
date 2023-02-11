{{-- @dd($content) --}}
<div {{ $attributes->merge(["class" => "topic"]) }}>
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <x-details :user="$content->user->id" :letter="ucwords($content->user->name[0] ?? 'a')"/>                                    
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">{{ $content->user->name }}</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>{{ $content->created_at?->format('l jS \of F Y h:i:s A') }}</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text space-y-4">
                                    {!! $content->description !!}
                                </div>
                                <div class="topic__footer">
                                    {{-- <div class="topic__footer-likes">
                                        <x-icons.action href="#" class="icon-Upvote">{{ $content->upvotes }}</x-icons.action>
                                        <x-icons.action href="#" class="icon-Downvote">{{ $content->downvotes }}</x-icons.action>
                                        <x-icons.action href="#" class="icon-Favorite_Topic">{{ $content->hearts }}</x-icons.action>
                                    </div> --}}
                                    <div class="topic__footer-share">
                                        {{-- <div data-visible="desktop">
                                            <x-icons.action href="#" class="icon-Share_Topic"></x-icons.action>
                                            <x-icons.action href="#" class="icon-Flag_Topic"></x-icons.action>
                                            <x-icons.action href="#" class="icon-Bookmark"></x-icons.action>
                                        </div> --}}
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        