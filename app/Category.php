<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function Forum()
    {
        return $this->hasMany('App\Forum', 'categoryid','id');
    }
}
