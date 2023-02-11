<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag) {
    	$questions = $tag->questions;
    	return view("index", [
    		"questions" => $questions
    	]);
    }
}
