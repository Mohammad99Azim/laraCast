<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $with = ['category', 'author'];  // to prevent the N+1 problem in querys

    use HasFactory;
    protected $fillable = ['title', 'category_id', 'slug', 'excerpt', 'body'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //    public function getRouteKeyName()
    //    {
    //        return ('slug');
    //    }
}
