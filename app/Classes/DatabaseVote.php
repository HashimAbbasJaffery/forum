<?php

namespace App\Classes;
use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\PlusReps;
use App\Classes\Vote as User_vote; 


class DatabaseVote extends User_vote
{
    public $counter = [];
    public function __construct(string $vote_type, Question $question) {
        parent::__construct($vote_type, $question);

        $this->counter = [
            "up" => 1,
            "down" => -1,
            "removeUp" => -1,
            "removeDown" => 1
        ];
    }
}
