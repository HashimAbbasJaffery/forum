<?php

namespace App\Classes;
use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\PlusReps;



class Vote
{
    protected $counter = [];
    public function __construct() {
        $this->counter = [
            "up" => 1,
            "down" => -1,
            "removeUp" => -1,
            "removeDown" > 1
        ];
    }

    public function vote(string $voteType, Question $question) {
        $databaseValidation = new DatabaseValidation( 
            $question->id,
            $voteType 
        );
        $is_exists = $databaseValidation->simple_validate();
    
        if($is_exists) {
            $this->counter["up"] = 2;
            $this->counter["down"] = -2;
        }
        $changeBy = $this->counter[ $voteType ];

        $question->update([
            "votes" => $question->votes + $changeBy
        ]);
    }
}
