<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug'];


    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();;
    }

    public function parentId()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

}
