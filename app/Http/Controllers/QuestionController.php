<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Classes\BadgesAwarded;
use Illuminate\Foundation\Events\Dispatchable;
use App\Events\NewComment;

class QuestionController extends Controller
{
    public function index() {
    	$tag_id = null;
    	if(request("tag")) {
    		$tag = request("tag");
	    	$tag_id = Tag::firstWhere("name", $tag);
    	}
    	$questions = Question::with(["category", "tags", "comments"])->filter([request(["category", "q"]), $tag_id])->simplePaginate(10);
		
    	return view("index", [
    		"questions" => $questions,
    	]);
    }
	public function create() {
		$tag_id = null;
    	if(request("tag")) {
    		$tag = request("tag");
	    	$tag_id = Tag::firstWhere("name", $tag);
    	}
    	$questions = Question::with(["category", "tags", "comments"])->filter([request(["category", "q"]), $tag_id])->get();
		$tags = Tag::all();
		$categories = Category::all();
		return view("create-topic", [
			"questions" => $questions,
			"tags" => $tags,
			"categories" => $categories
		]);
	}
	public function storeQuestion() {
		$badge = new BadgesAwarded(Auth()->user()->id);
		$badge->updateBadges();
		$attributes = request()->validate([
			"title" => ["required", "min:10", "max:60"],
			"category_id" => ["required"],
			"description" => ["required", "min:30", "max:1000"]
		]);
		$attributes["user_id"] = auth()->user()->id;
		$attributes["slug"] = Str::slug($attributes["title"]);
		$question = Question::create($attributes);
		$question->tags()->attach(explode(",", request()->input("tags")));
		$slug = $attributes['slug'];
		return redirect()->to("/question/$slug");
	}
	public function show(Question $question) {
		return view("single", [
			"question" => $question,
			"questions" => Question::byTagId($question)
		]);
	}
	public function store(Question $question) {
		$attribute = request()->validate([
			"comment" => ["required", "min:10", "max:100"]
		]);
		$question->comments()->create([
			"user_id" => auth()->user()->id,
			"description" => request()->comment,
			"upvotes" => 0,
			"downvotes" => 0, 
			"hearts" => 0,
			"status" => 1
		]);
		// dispatch(new NewComment(auth()->user(), $question->user));
		// NewComment::dispatch(auth()->user(), $question->user);
		// new NewComment()
		event(new NewComment(auth()->user(), $question->user, $question));
		return redirect()->back();
	}
}
