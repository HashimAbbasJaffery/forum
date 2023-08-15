{{-- @dd($content) --}}
<div {{ $attributes->merge(["class" => "topic"]) }}>
                            @if(!(isset($content->solved_id) || isset( $content->comment_id )))
                                @php 
                                    $question = App\Models\Question::find( $content->question_id );
                                    $solved_id = $question->solved_id;
                                    $comment_id = $content->id;
                                    $isSelected = $solved_id == $comment_id;
                                @endphp
                                
                                <button id="comment-{{ $content->id }}" class="solve_button {{ ( $isSelected )? "solved" : "" }} " onclick='isAnswer( "{{ $content->question_id }}", "{{ $content->id }}", "{{ $content->user_id }}" )'>Mark it as correct answer!</button>
                            @endif
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
                        </div><script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const dispatchAnswer = (url, dataset, success, failed) => {
            axios.post(url, dataset)
            .then(res => {
                success(res);
            })
            .catch(err => {
                failed(err);
            })
        }
        const successSolvedCallback = res => {
            console.log(res);
            const isSuccess = res.data.status;
            if(!isSuccess) {
                const error = document.getElementById("error");
                const message = res.data.message;
                error.innerHTML = `<p>${message}</p>`
                error.style.display = "block";
                setTimeout(() => {
                    error.style.display = "none";
                }, 10000)
            } 

            const old_answer = res.data.old_answer;
            const new_answer = res.data.new_answer;
            if(old_answer) {
                const comment = document.getElementById( "comment-" + old_answer );
                comment.classList.remove("solved");

                const answer_comment = document.getElementById("comment-" + new_answer);
                answer_comment.classList.add("solved");
            }
        }
        const failedSolvedCallback = res => {

        }
        const isAnswer = (id, comment_id, user_id) => {
            const data = {
                id: id,
                comment_id: comment_id,
                user_id: user_id
            };
            dispatchAnswer(
                `/question/${comment_id}/solved`,
                data, 
                successSolvedCallback,
                failedSolvedCallback
            )
        }
    </script>
                        