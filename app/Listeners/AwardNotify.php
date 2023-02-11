<?php

namespace App\Listeners;

use App\Events\BadgeAward;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AwardNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BadgeAward $event)
    {
        $user = $event->user;
        $event->user_id;
        DB::table("notifications")
            ->where("user_id", $user->id)
            ->update([
                "message" => "You have been awarded a badge",
                "isRead" => 0
            ]);
    }
}
