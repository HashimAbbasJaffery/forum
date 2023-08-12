<?php 

namespace App\Classes;
use App\Models\User;
use App\Models\Vote;

class DatabaseValidation {
    protected $question_id;
    protected $task;
    public function __construct(int $question_id, string $task) {
        $this->question_id = $question_id;
        $this->task = $task;
    }
    public function validate() {
        $collectionCount = Vote::where("user_id", auth()->user()->id)
                                ->where("question_id", $this->question_id)
                                ->where("vote_type", $this->task)
                                ->count();
        return ($collectionCount > 0)? false : true;
    }

}

?>