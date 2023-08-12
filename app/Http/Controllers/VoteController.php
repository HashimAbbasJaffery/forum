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
    public function isSelfVote($question_owner_id)
	{
		$user = auth()->user();

		if ($user && ($user->id !== $question_owner_id)) {
			return [
				"status" => true
			];
		}

		return [
			"status" => false,
			"message" => "You can not vote yourself!"
		];
	}
	public function isVerifiedFor(array $verfications)
	{
		foreach ($verfications as $verification => $parameter) {
			$isEligible = $this->$verification($parameter);
			if (!$isEligible["status"]) {
				return [
					"status" => false,
					"message" => $isEligible["message"]
				];
			}
		}
		return [
			"status" => true
		];
	}

    public function vote(Question $question)
	{	
		$voteType = request()->get("voteType");
		$reward = 5;
		$votes = count($question->votes) + 1;
		if ($voteType === "down") {
			$reward = -$reward;
			$votes = count($question->votes) - 1;
		}
		$reputations = (
            new Reputations(
                    $question->user, 
                    $reward, 
                    new ReputationValidation(
                        $voteType,
                        new DatabaseValidation( 
                            $question->id
                        )
                    )
                )
            )->reputationPersistence();
        
        if ($reputations !== true) {
            return [
                "status" => false,
				"message" => $reputations
			];
		}
		$varifications = [
            "isSelfVote" => $question->user->id,
		];
        
        $isVerified = $this->isVerifiedFor($varifications);
        
		try {
			if (!$isVerified["status"]) {
				return response()->json([
					"status" => false,
					"message" => $isVerified["message"]
				]);
			}
		} catch (\Exception $e) {
			return $e;
		}

		$question->votes()->insert([
			"vote_type" => $voteType,
			"question_id" => $question->id,
			"user_id" => auth()->user()->id
		]);

        $reciever_id = $question->user->id;
        event(new PlusReps($reciever_id, $reward));

        $upvotes = $question->votes->where("vote_type", "up")->count() ;
		$downvotes = $question->votes->where("vote_type", "down")->count() ;
        return response()->json([
			"votes" => (($voteType === "up") ? $upvotes + 1 : $upvotes) - (($voteType === "down") ? $downvotes + 1 : $downvotes),
			"status" => true
		]);
	}
}
