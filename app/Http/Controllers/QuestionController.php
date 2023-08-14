<?php

namespace App\Http\Controllers;

use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Classes\BadgesAwarded;
use Illuminate\Foundation\Events\Dispatchable;
use App\Events\NewComment;
use App\Models\User;
use App\Models\Vote;

class QuestionController extends Controller
{
	public function index()
	{
		$tag_id = null;
		if (request("tag")) {
			$tag = request("tag");
			$tag_id = Tag::firstWhere("name", $tag);
		}
		$questions = Question::with(["category", "tags", "comments"])->filter([request(["category", "q"]), $tag_id])->simplePaginate(10);

		return view("index", [
			"questions" => $questions,
		]);
	}
	public function create()
	{
		$tag_id = null;
		if (request("tag")) {
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
	public function storeQuestion()
	{
		$badge = new BadgesAwarded(Auth()->user()->id);
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
		$user = User::firstWhere("id", auth()->user()->id);
		$badge->updateBadges();
		// event(new BadgeAward($user, auth()->user()->id));
		return redirect()->to("/question/$slug");
	}
	public function show(Question $question)
	{

		$votes = Vote::where("question_id", $question->id);
		
		$upvotes = $votes->where("vote_type", "up")->count();
		$downvotes = $votes->where("vote_type", "down")->count();
		$selected = null;
		if(auth()->user()) {
			$selected = Vote::where("question_id", $question->id)
								->where("user_id", auth()->user()->id)
								->first();
		}
		return view("single", [
			"votes" => $upvotes - $downvotes,
			"question" => $question,
			"selectedVote" => $selected->vote_type ?? "",
			"questions" => Question::byTagId($question)
		]);
	}
	public function upvote(Question $question)
	{
		return json_encode($question);
	}
	public function store(Question $question)
	{
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
	public function adjust_reputation($user, $reputation)
	{
		$overAllRep = $user->profile->reputation;
		$newRep = $overAllRep + $reputation;
		$user->profile()->update([
			"reputation" => ($newRep < 0) ? 0 : $newRep
		]);
	}
	public function isLoggedIn()
	{
		$user = auth()->user();

		if ($user) {
			return [
				"status" => true
			];
		}
		return [
			"status" => false,
			"message" => "Please login!"
		];
	}
	public function isEligibeFor($task = "up")
	{
		$minRepsRequired = 10;
		$user = auth()->user();
		if ($task === "down") {
			$minRepsRequired = 20;
		}
		if ($user && ($user->profile->reputation > $minRepsRequired)) {
			return [
				"status" => true
			];
		}
		return [
			"status" => false,
			"message" => "You need " . $minRepsRequired . " reps to " . $task . "vote"
		];
	}
	public function solved(User $user) {
		$user_id = request()->get("user_id");
		$question =  Question::find( request()->get("id") );
		
		$question->update([
			"solved_id" => $user_id
		]);

		return $question;
	}
}