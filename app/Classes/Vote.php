<?php

namespace App\Http\Controllers;

use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\PlusReps;



class VoteController extends Controller
{
    protected $vote_type;
    protected $question;
    public function __construct(string $vote_type, Question $question) {

        $this->vote_type = $vote_type;
        $this->question = $question;

    }

    public function vote() {
        $question = $this->question;

        $question->votes()->updateOrInsert( [
            "question_id" => $question->id,
            "user_id" => auth()->user()->id 
        ], [
            "vote_type" => $this->vote_type
        ]);

    }
}
