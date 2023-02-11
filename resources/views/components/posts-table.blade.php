           @props(["questions"])
           <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Topic</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Users</div>
                    <div class="posts__replies">Replies</div>
                </div>
                    <div class="posts__body" id="topics">
                    @forelse ($questions as $question)
                        <x-post :question="$question" />
                    @empty
                        <div class="alert alert-danger">
                            <p>
                                You didn't ask the questions yet...
                                <a href="/create-question" style="color: #a94442;" class="hover:underline">
                                    <b>Ask question</b>
                                </a>
                            </p>
                        </div>    
                    @endforelse
                 </div>
            </div>

        