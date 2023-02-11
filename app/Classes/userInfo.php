<?php 
namespace App\Classes;

use App\Models\Question;
use App\Models\User;

class UserInfo {
    public static function get_id($username) {
        $user = User::where("username", $username)->first();
        return $user->id;
    }
}

?>