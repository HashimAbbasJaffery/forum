<?php

namespace App\Http\Controllers;

use App\Classes\ChangeReputation;
use App\Classes\DatabaseVote;
use App\Classes\Reputations;
use App\Classes\ReputationValidation;
use App\Classes\DatabaseValidation;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\PlusReps;
use App\Models\Vote;
use App\Classes\Vote as UserVote;



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

	protected function removeVote(Question $question, $changeBy, $does_exist) {
		if(!auth()->user()) return;
		if(!$does_exist) return;
		Vote::where("question_id", $question->id)
				->where("user_id", auth()->user()->id)
				->delete();
		$question->update([
			"votes" => $question->votes + $changeBy
		]);
	}
    public function vote(Question $question)
	{	
		// If votes already exists then double the reward

		$voteType = request()->get("voteType");
		$does_exists = (new DatabaseValidation($question->id, $voteType))
							->simple_validate();
		

		$changeByValues = [
			"up" => -1,
			"down" => 1
		];
		$reward = 5;
		if( $voteType === "removeUp" || $voteType === "removeDown" ) {
			$task =  strtolower(str_replace("remove", "", $voteType));
			
			if( $task === "up" ) $reward = -$reward;
			
			$user = $question->user;
			$user->profile()->update([
				"reputation" => $user->profile->reputation + $reward 
			]);


			$validation = (new DatabaseValidation($question->id, $task))->simple_validate();
			$changeBy = $changeByValues[$task];
			$this->removeVote($question, $changeBy, $validation);
			return [
				"votes" => $question->votes,
				"status" => true,
				"type" => false
			];
		}
		// $votes = count($question->votes) + 1;
		if ($voteType === "down") {
			$reward = -$reward;
			// $votes = count($question->votes) - 1;
		}

			$reputations = (new ChangeReputation())->changeReps(
				$question->user, 
				($does_exists) ? $reward * 2 : $reward, 
				$voteType, 
				$question->id
			);
        
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
		$vote = (new UserVote())->vote( $voteType, $question );
		
		$question->votes()->updateOrInsert( [
			"question_id" => $question->id,
			"user_id" => auth()->user()->id 
		], [
			"vote_type" => $voteType
		]);


        $reciever_id = $question->user->id;
        event(new PlusReps($reciever_id, $reward));

		$question = Question::where("id", $question->id)->first();
		
		return response()->json([
			"votes" => $question->votes,
			"status" => true,
			"type" => $voteType
		]);
	}
}
