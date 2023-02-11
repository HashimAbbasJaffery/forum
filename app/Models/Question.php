<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Question extends Model
{
	protected $attributes = [
		'upvotes' => 0,
		'downvotes' => 0,
		'hearts' => 0,
		'status' => 1,
	];
	protected $guarded = ["id", "created_at", "updated_at"];
	protected $with = ["user", "category", "tags", "comments"];
	public function category() {
		return $this->belongsTo(Category::class);
	}
	public function tags() {
    	return $this->belongsToMany(Tag::class);
    }
    public function comments() {
    	return $this->hasMany(Comment::class);
    }
	public function user() {
		return $this->belongsTo(User::class);
	}
    public function scopeFilter($query, array $filter) {
		// dd($filter[1]);
		$query->when($filter[0]["category"] ?? null, function ($query, $search) {
			$query->whereExists(function($query) use ($search) {
    			$query->from("categories")
    					->whereColumn("categories.id", "questions.category_id")
    					->where("categories.slug", $search);
    		});
    	});
		$query->when($filter[1] ?? null, function ($query, $search) {
			// dd($search);
			$query->whereExists(function($query) use ($search) {
    			$query->from("question_tag")
    					->whereColumn("question_tag.question_id", "questions.id")
    					->where("question_tag.tag_id", $search->id);
    		});
    	});
		$query->when($filter[0]["q"] ?? null, function ($query, $search) {
			$query->where(function ($query) use ($search) {
				$query->where("title", "like", "%" . $search . "%")
					->orWhere("description", "like", "%" . $search . "%");
			}
			);
		});
    	// dd($query->toSql());
    	// return $query->toSql();
    	return $query;
    }
	public function scopeByTagId($query, $question) {
		$questions = collect([]);
		$results = $question->tags;
		foreach($results as $result) {
			$questions->push($result->questions);
		}
		$questions = $questions->flatten()->unique("id");
		return $questions->all();
	}
    use HasFactory;
}
