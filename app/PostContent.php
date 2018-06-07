<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    protected $fillable = [
        'post_id',
        'group_id',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }
}
