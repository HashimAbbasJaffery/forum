<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Layouts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $id = null;
        if(auth()->user()) {
            $id = auth()->user()->id;
        }
        $unReadNotifications = DB::table("notifications")
            ->where("user_id", $id)
            ->where("isRead", 0)
            ->get();
        return view('components.layouts', compact("unReadNotifications"));
    }
}
