<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Badge extends Model
{
    protected $guarded = [];
    protected $table = "user_badges";
    public function users() {
        return $this->hasMany(User::class);
    }
    use HasFactory;
}
