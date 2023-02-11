<?php

namespace App\Http\Controllers;

use App\Classes\MarkupGenerator;
use App\Classes\UserInfo;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function oldNotifications($username) {
        if(!(auth()->user()->username == $username)) {
            abort(404);
        }
        $user = User::firstWhere("username", $username);
        $notifications = DB::table("notifications")
            ->where("user_id", $user->id)
            ->where("isRead", 1)
            ->orderBy("created_at", "desc")
            ->take(10)
            ->get();
        return view("notifications", compact("notifications", "username"));
    }
    public function readNotifications($id) {
        $notifications = DB::table("notifications")
            ->where("user_id", $id)
            ->update([
                "isRead" => 1
            ]);
        return $id;
    }
    public function search() {
        $url = url()->current();
        $username = request()->get("user");
        $id = null;
        if($username)
            $id = UserInfo::get_id($username);
        $tag_id = null;
    	if(request("tag")) {
    		$tag = request("tag");
	    	$tag_id = Tag::firstWhere("name", $tag);
    	}
        $questions = Question::with(["category", "tags", "comments"])
            ->filter([request(["category", "q"]), $tag_id])
            ->where(function($questions) use ($id){
                if($id != null) {
                    $questions->where("user_id", $id);
                }
            })
            ->simplePaginate(10);
        return MarkupGenerator::Generate($questions);
    }
    public function update($username) {
        $user = User::firstWhere("username", $username);
        $file = request()->file("upload_pic");
        $destinationPath = "uploads";
        $file->move($destinationPath, $file->getClientOriginalName());
        DB::table("profile")->where("user_id", $user->id)->update([
            "profile_pic" => $file->getClientOriginalName()
        ]);
    }
}
