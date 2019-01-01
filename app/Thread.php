<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum','forumid');
    }
}
