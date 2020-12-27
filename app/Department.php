<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Translatable;

    protected $table = 'departments';
    protected $fillable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords','add_home','add_icon'];
    protected $translatable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords'];
}
