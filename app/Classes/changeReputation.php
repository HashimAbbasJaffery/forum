<?php 

namespace App\Classes;
use App\Models\User;
use App\Models\Vote;
use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;

class ChangeReputation {
    
    public function changeReps(User $user, $reward, $voteType, $question_id) {
        $reputations = (
            new Reputations(
                    $user, 
                    $reward, 
                    new ReputationValidation(
                        $voteType,
                        new DatabaseValidation( 
                            $question_id,
							$voteType
                        )
                    )
                )
            )->reputationPersistence();
            return $reputations;
    }

}

?>