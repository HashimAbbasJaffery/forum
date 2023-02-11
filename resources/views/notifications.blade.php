    <x-layouts>
        <h1 class="font-bold text-7xl mt-10">Old Notifications</h1>

        @forelse($notifications as $notification)
            <p class="mt-20 text-4xl">{{ date("d-M-Y", strtotime($notification->created_at)) }} - {!! $notification->message !!}</p>
        @empty 
            <p class="alert alert-danger mt-10">No old notifications</p>    
        @endforelse
    </x-layouts> 