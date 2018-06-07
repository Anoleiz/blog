<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'state'
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany('App\PostContent', 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
