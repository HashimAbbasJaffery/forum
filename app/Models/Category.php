<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
	public function questions() {
		return $this->hasMany(Question::class);
	}
    use HasFactory;
}
