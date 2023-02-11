<?php 

namespace App\Classes;
use App\Listeners\AwardNotify;
use App\Events\BadgeAward;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BadgesAwarded {
    protected $id;
    protected User $user;
    protected $awards = [];
    function __construct(int $id) {
        $this->id = $id;
        $this->user = User::find($id);
    }
    protected function badgeClearence(int $limit) {
        $questions = $this->user->questions;
        if(count($questions) >= $limit) {
            return true;
        } else {
            return false;
        }
    }
    protected function showAllBadges() {
        $badges = $this->user->badges;
        if(count($badges) > 0) {
            foreach($badges as $badge) {
                array_push($this->awards, $badge->badge_id);
            }
        }
    }
    protected function isAlreadyAwarded($id) {
        foreach ($this->awards as $award) {
            if($award == $id) {
                return true;
            } 
        }
        return false;
    }
    protected function badge(int $id = 1, int $limit = 1) {
        // Award ID of the badge
        $awardId = $id;
        // Checks if the user meets the minimum requirements
        if (!$this->badgeClearence($limit)) return false;
        // checks if the user is already awarded this badge
        if ($this->isAlreadyAwarded($awardId)) return false;
        $this->awardBadge($id);
        return true;
    }
    protected function awardBadge($id) {
        DB::table("user_badges")->insert([
            "user_id" => $this->id,
            "badge_id" => $id
        ]);
        event(new BadgeAward($this->user, $id));
    }
    public function updateBadges() {
        // newbie badge
        $this->showAllBadges();
        $this->badge(1, 1);
        // Master badge
        $this->badge(2, 5);
        // Guru badge
        $this->badge(3, 50);
        // Mastermind badge
        $this->badge(4, 100);
    }
    public function dummyInsert() {
        for ($i = 0; $i < 48; $i++) {
            DB::table("questions")->insert([
                "title" => "1238768765754",
                "category_id" => 1,
                "user_id" => 8,
                "description" => "That is quiet awkward to do that",
                "upvotes" => 1,
                "downvotes" => "1",
                "hearts" => "1",
                "status" => 1,
                "slug" => "monkey"
            ]);
        }
    }
}

?>