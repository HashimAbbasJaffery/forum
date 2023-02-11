<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function show($username) {
        
        $userID = User::firstWhere("username", $username)->id;$tag_id = null;
    	if(request("tag")) {
    		$tag = request("tag");
	    	$tag_id = Tag::firstWhere("name", $tag);
    	}
    	$questions = Question::with(["category", "tags", "comments"])->filter([request(["category", "q"]), $tag_id])->where("user_id", $userID)->simplePaginate(10);
		
        return view("index", [
            "questions" => $questions
        ]);
    }
}
