<x-layouts>
		<x-navbar />
            <div class="topics">
                <div class="topic-header">
                    <div class="topics__heading">
                        <h2 class="topics__heading-title">{{ $question->title }}?</h2>
                        <div class="topics__heading-info">
                            <a href="#" class="category"><i class="bg-3ebafa"></i>{{ $question->category->name }}</a>
                            <div class="tags">
                                @forelse ($question->tags as $tag)
                                    <x-link class="bg-4f80b0" href="/?tag={{ $tag->name }}">{{ $tag->name }}</x-link>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="vote-question">
                        <button class="upvote vote-button {{ ( $selectedVote == "up" )? "selected-button" : "" }}">Upvote</button>
                        <p class="votes">{{ $question->votes }}</p>
                        <button class="downvote vote-button {{ ( $selectedVote == "down" )? "selected-button" : "" }}">Downvote</button>
                    </div>
                </div>
                <div class="topics__body">
                    
                    <div class="topics__content">
                        
                        <x-topic :content="$question"/>
                        <h1 class="text-6xl font-bold mt-10 mb-10">Replies</h1>
                        @forelse ($question->comments as $comment)
                            
                            <x-topic :content="$comment" />
                            @if(count($comment->replies) > 0)
                                @foreach($comment->replies as $reply)
                                    <x-topic :content="$reply" class="topic--comment"/>
                                @endforeach
                            @endif
                        @empty
                            <div class="flex items-center rounded-xl bg-blue-500 text-white text-sm font-bold px-4 py-3 text-2xl" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                <p>You have an opportunity to start the discussion :- ) Go Ahead!</p>
                            </div>
                        @endforelse
                        <div class="comment mt-10 mb-10 w-1/2">
                            <form action="/question/{{ $question->id }}/comment" method="post">
                                @csrf
                                <h1 class="mb-10 text-6xl font-bold">Comment</h1>
                                <x-form.textarea name="comment" />
                                <button class="bg-blue-500 hover:bg-blue-600 px-10 py-3 rounded-xl text-white" type="submit">Submit</button>
                            </form>
                        </div>
                    {{-- <x-topic-calender /> --}}
                </div>
            </div>
        <x-posts-table :questions="$questions"/>
        {{-- @dd( auth()->user()->profile->reputa )     --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const dispatch = (url, dataset, success, failed) => {
            axios.post(url, dataset)
            .then(res => {
                success(res);
            })
            .catch(err => {
                failed(res);
            })
        }

        const upvote = document.querySelector(".upvote");
        const downvote = document.querySelector(".downvote");
        const toggleClass = (element, className) => {
            const el = document.querySelector("." + element);
            el.classList.toggle(className);
        }

        const successCallback = res => {
            const className = "selected-button";
            const voteType = res.data.type;
            const upvote = document.querySelector(".upvote");
            const downvote = document.querySelector(".downvote");

            if(voteType === "up") {
                upvote.classList.add(className);
                downvote.classList.remove(className);
            } else if(voteType === "down"){
                upvote.classList.remove(className);
                downvote.classList.add(className);
            } else {
                upvote.classList.remove(className);
                downvote.classList.remove(className);
            }

            const voteElement = document.querySelector(".votes");
            const votes = res.data.votes;
            const isSuccess = res.data.status;
            if(isSuccess) {
                voteElement.textContent = votes
            } else {
                const error = document.getElementById("error");
                const message = res.data.message;
                error.innerHTML = `<p>${message}</p>`
                error.style.display = "block";
                setTimeout(() => {
                    error.style.display = "none";
                }, 10000)
            }
        }
        const failedCallback = (res) => {
            console.log(res);
        }
        upvote.addEventListener("click", () => {
            const isSelected = upvote.classList.contains("selected-button");
            let voteType = "up";
            if( isSelected ) {
                voteType = "removeUp"
            }
            dispatch(
                "/question/{{ $question->slug }}/upvote",
                {
                    voteType: voteType
                },
                successCallback,
                failedCallback
            )
        })
        
        downvote.addEventListener("click", () => {
            const isSelected = downvote.classList.contains("selected-button");
            let voteType = "down";
            if( isSelected ) {
                voteType = "removeDown";
            }
            dispatch(
                "/question/{{ $question->slug }}/upvote",
                {
                    voteType: voteType
                },
                successCallback
            )
        })
        
    </script>
    
    
</x-layouts>