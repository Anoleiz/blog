<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'comment_id', 'comment'];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'comment_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany('App\Comment', 'comment_id', 'id');
    }
}
