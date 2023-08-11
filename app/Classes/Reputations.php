<?php 

namespace App\Classes;
use App\Models\User;

class Reputations {

    protected $user;
    protected $reputation;
    protected $validation;
    public function __construct(User $user, $reputation, ReputationValidation $validation) {
        $this->user = $user;
        $this->reputation = $reputation;
        $this->validation = $validation;
    }

    public function reputationPersistence() {
        $validation = $this->validation->validate();
        if($validation !== true) {
            return $validation;
        }
        $user = $this->user;
        $reputation = $this->reputation;
        $overAllRep = $user->profile->reputation;
		$newRep = $overAllRep + $reputation;
		$user->profile()->update([
			"reputation" => ($newRep < 0) ? 0 : $newRep
		]);
        return true;
    }

}

?>