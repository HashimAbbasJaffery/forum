<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $guarded = [];
    protected $with = ["user", "replies"];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
    use HasFactory;
}
