<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'post_id', 'parent_id'
    ];

    /*
     * The commentn that belong to user
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /*
     * The comment that belong to post
     */
    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

    public function children() {
        return $this->hasMany('App\Models\Comment');
    }
}
