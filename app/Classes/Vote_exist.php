<?php

namespace App\Classes;
use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\PlusReps;


class Vote_exist
{
    protected $vote_type;
    protected $user_id;
    protected $question_id;
    public function __construct( $vote_type, $user_id, $question_id ) {
        $this->vote_type = $vote_type;
        $this->user_id = $user_id;
        $this->question_id = $question_id;
    }

    public function is_exist() {
        
    }
}
