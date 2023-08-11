<?php 

namespace App\Classes;
use App\Models\User;

interface RepValidation {
    protected function isLoggedIn();
    protected function isEligibleFor( $task );
}

?>