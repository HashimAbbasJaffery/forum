<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Badge;
use App\Models\Question;
use App\Models\Comment;
use App\Models\profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function badges() {
        return $this->hasMany(Badge::class);
    }
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    protected function password(): Attribute {
        return Attribute::make(
            set: fn($value) => bcrypt($value)
        );
    }
}
