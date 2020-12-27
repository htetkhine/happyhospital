<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siteinfo extends Model
{
    protected $fillable = ['address','phone','email'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
