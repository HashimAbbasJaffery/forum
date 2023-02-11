<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class profile extends Model
{
    protected $table = "profile";
    public function user() {
        return $this->hasOne(User::class);
    }
    use HasFactory;
}
