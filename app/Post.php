<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords','view_count','created_at'];


    public function categories()
    {
        return $this->belongsToMany( Category::class)->withTimestamps();
    }
}
