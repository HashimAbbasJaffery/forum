<?php 

namespace App\Classes;
use App\Models\User;
use App\Models\Vote;

class DatabaseValidation {
    protected $question_id;
    public function __construct(int $question_id) {
        $this->question_id = $question_id;
    }
    public function validate() {
        $collectionCount = Vote::where("user_id", auth()->user()->id)
                                ->where("question_id", $this->question_id)
                                ->count();
        return ($collectionCount > 0)? false : true;
    }

}

?>