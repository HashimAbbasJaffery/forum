<div>
    
    @props([
        "letter" => "A", 
        "editable" => 0,
        "profile_pic" => 0,
        "href" => "#",
        "isDP" => "false"
    ])
    <div>
        {{-- !is_null($profile?->profile_pic) --}}
        {{-- @dd(is_null($profile?->profile_pic)) --}}
        {{-- @dd($profile?->profile_pic == "") --}}
        @if(!$editable)
        {{-- @dd(is_null($profile?->profile_pic)) --}}
            <a href="{{ $href }}" {{ $attributes->merge(["class" => "avatar"]) }}><img class="rounded-full avatar" style="width: 144px; {{ $isDP == "true" ? "" : "height: 32px" }}" src="{{ ($profile?->profile_pic != "") ? "/uploads/" . $profile?->profile_pic : "/fonts/icons/avatars/$letter.svg" }}" alt="avatar"></a>
            {{-- <a href="#" {{ $attributes->merge(["class" => "avatar"]) }}><img class="rounded-full avatar" style="width: 144px; height: 32px;" src="{{ $profile->profile_pic ?? }}" alt="avatar"></a> --}}
        @else 
            <form id="fileUpload">
                <a href="{{ $href }}" onclick="document.getElementById('upload_pic').click()" {{ $attributes->merge(["class" => "avatar"]) }} ><img id="output" style="width: 144px; height: 144px;" class="rounded-full avatar" src="{{ ($profile?->profile_pic != "") ? "/uploads/" . $profile?->profile_pic : "/fonts/icons/avatars/$letter.svg" }}" alt="avatar"></a>
                <input class="hidden" type="file" name="upload_pic" id="upload_pic">
            </form>
        @endif

    </div>
</div>