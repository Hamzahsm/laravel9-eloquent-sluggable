<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// include eloquent sluggable
use Cviebrock\EloquentSluggable\Sluggable; 

class Post extends Model 
{
    use HasFactory, Sluggable;
}
