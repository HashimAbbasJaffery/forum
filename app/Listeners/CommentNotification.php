<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewComment;
use Illuminate\Support\Facades\DB;

class CommentNotification
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
    public function handle(NewComment $event)
    {
        $senderName = $event->sender->name;
        $recieverID = $event->reciever->id;
        $senderID = $event->sender->id;
        if($recieverID == $senderID) {
            return;
        }
        // dd($recieverID);
        $title = $event->question->title;
        $message = "$senderName just commented on <strong>$title</strong>";
        DB::table("notifications")->insert([
            "user_id" => $recieverID,
            "isRead" => false,
            "message" => $message
        ]);
    }
}
