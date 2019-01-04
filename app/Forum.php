<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Category','categoryid');
    }

    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

    public function thread()
    {
        return $this->hasMany('App\Thread','forumid');
    }
}
