<?php 

namespace App\Classes;
use App\Models\User;

class ReputationValidation {

    protected $task;
    protected $tasks = [];
    protected $DBvalidation;
    public function __construct(
        string $task, 
        DatabaseValidation $DBvalidation = null
    ) {
        $this->task = $task;
        $this->DBvalidation = $DBvalidation;
        // These tasks will be fetched from the database. but for now they are static

        $this->tasks = [
            "up" => 30,
            "down" => 20,
            "modify" => 200,
            "close" => 500
        ];

    }
    protected function isLoggedIn() {
        $user = auth()->user();

		if($user) {
			return [
				"status" => true 
			];
		}
		return [
			"status" => false,
			"message" => "Please login!"
		];
    }

    protected function isTaskExist() : bool {
        if( array_key_exists($this->task, $this->tasks) ) {
            return true;
        }
        return false;
    }

    protected function isEligibleFor() {
        $minRepsRequired = $this->tasks[$this->task];
		$user = auth()->user();
        if($user) {
            if($user->profile->reputation > $minRepsRequired) {
                return [
                    "status" => true
                ];
            }
        }
		return [
			"status" => false,
			"message" => "You need " . $minRepsRequired . " reps to " . $this->task . "vote"
		];
    }

    public function validate() {
        if(!$this->isTaskExist()) return "This error is from Admin side. Please stay tune!";
        if(!$this->isLoggedIn()["status"]) return $this->isLoggedIn()["message"];
        if(!$this->isEligibleFor()["status"]) return $this->isEligibleFor()["message"];
        if(!$this->DBvalidation->validate()) return "You have already voted!";
        return true;
    }
}

?>