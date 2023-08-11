<?php

namespace App\Listeners;


use App\Events\PlusReps;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class PlusRepsNotify
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
    public function handle(PlusReps $event)
    {
        $user_id = $event->reciever_id;
        $reputations = $event->reputations;
        if($reputations > 0) {
            $message = "Got $reputations more Reputation";
        } else if($reputations < 0){
            $reputations = abs($reputations);
            $message = "You lost {$reputations} reputations :(";
        }
        DB::table("notifications")->insert([
            "user_id" => $user_id,
            "isRead" => false,
            "message" => $message
        ]);
    }
}
