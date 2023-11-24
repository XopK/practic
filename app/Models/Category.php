<?php

namespace App\Models;
use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany(Course::class);
    }
}
