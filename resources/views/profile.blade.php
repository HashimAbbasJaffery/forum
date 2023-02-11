<x-layouts>
    <div class="user-header rounded-md px-4 flex">
        <header class="text-center w-56">
            @php
                $id = 2;
            @endphp
            <x-details 
                isDP="true"
                :user="$user->id"
                class="w-96 mt-10 py-4" 
                letter="{{ $user->username[0] }}" 
                editable="{{ Auth::user() && Auth::user()->username == $user->username }}"
                profile_pic="{{ $user?->profile?->profile_pic }}"
            />
            <h1 class="text-4xl font-bold mt-3">{{ $user->username }}</h1>
            <p class="text-slate-600 mt-2">{{ $user?->created_at?->diffForHumans() }}</p>
        </header>
        <article class="ml-10" style="margin-top: 60px;">
            <p>
                @if($user?->profile?->description)
                    <p>{{ $user->profile?->description }}</p>
                @else 
                    <p>No description posted by the user yet...</p>
                @endif
            </p>
        </article>
    </div>
    @if(!$user->profile?->is_private)
    <hr class="mt-10" style="background: rgba(0, 0, 0, 0.4); height: 1px;" />
    <div class="user-detail flex justify-around mt-10">
        <div class="questions">
            <h1 class="text-6xl mb-4">Questions</h1>
            <p class="text-center">{{ count($user->questions) }} Questions</p>
        </div>
        <div class="replies">
            <h1 class="text-6xl mb-4">Comments</h1>
            <p class="text-center">{{ count($user->comments) }} Comments</p>
        </div>
    </div>
    @if(count($user->badges) > 0)
        <hr class="mt-10" style="background: rgba(0, 0, 0, 0.4); height: 1px;" />
        <div class="user-detail flex justify-around mt-10 badges">
            <div id="badge-1" class="hidden questor-badge text-center bg-green-500 text-white py-4 px-9 rounded-lg">
                <p class="text-6xl">Questor</p>
                <p class="mt-3">1 Question Asked</p>
            </div>
            <div id="badge-2" class="hidden questor-badge text-center bg-yellow-600 text-white py-4 px-9 rounded-lg">
                <p class="text-6xl">Master</p>
                <p class="mt-3">5 Question Asked</p>
            </div>
            <div id="badge-3" class="hidden questor-badge text-center bg-cyan-500 text-white py-4 px-9 rounded-lg">
                <p class="text-6xl">Guru</p>
                <p class="mt-3">50 Question Asked</p>
            </div>
            <div id="badge-4" class="hidden questor-badge text-center bg-rose-600 text-white py-4 px-9 rounded-lg">
                <p class="text-6xl">Mastermind</p>
                <p class="mt-3">100 Question Asked</p>
            </div>
        </div>
    @endif
    @php
        $badges = [];
        foreach($user->badges as $badge) {
            array_push($badges, $badge->badge_id);
        }
    @endphp
    <input type="hidden" name="badges" id="badges" value="{{ implode(", ", $badges) }}">
    <hr class="mt-10" style="background: rgba(0, 0, 0, 0.4); height: 1px;" />
    <div class="questions-list">
        <h1 class="text-7xl mt-10 text-center">Questions Asked</h1>
        <x-posts-table :questions="$user->questions"/>
    </div>
    {{-- <hr class="mt-10" style="background: rgba(0, 0, 0, 0.4); height: 1px;" />
    <div class="replies-list">
        <h1 class="text-7xl mt-10 text-center">Replies</h1>
        <x-posts-table :questions="$user->replies"/>
    </div> --}}
    <script>
        const el = document.getElementById("badges").value;
        const values = el.split(", ");
        values.forEach(value => {
            const badge = document.getElementById(`badge-${value}`);
            badge.classList.remove("hidden");
        })
        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        const renderImage = (value) => {
            const avatars = document.querySelectorAll(".avatar");
            var fReader = new FileReader();
            fReader.readAsDataURL(value);
            fReader.onloadend = function(event){
                avatars.forEach(avatar => {
                    avatar.src = event.target.result;
                    avatar.setAttribute("src", event.target.result);
                })
                // var img = document.getElementById("output");
                // img.src = event.target.result;
                console.log(event.target.result);
            }
        }
        const fileEl = document.getElementById("upload_pic");
        fileEl.addEventListener("change", function(event) {
            let value = fileEl.files[0];
            
            renderImage(value);

            const inputDetails = new FormData();
            inputDetails.append("upload_pic", value);
            for(datum of inputDetails) {
                console.log(datum[0], datum[1])
            }
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    method: 'POST',
                    url: "/profile/{{ (Auth()->user()) ? auth()->user()->username : 'goofyguy' }}/picture",
                    // contentType: "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2),
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: inputDetails,
                    success: function(data) {
                        console.log(data);
                    }
                }
            )
        })
    </script>
    @else 
        <div class="alert alert-danger mt-10">This profile is private</div>
    @endif
</x-layouts>