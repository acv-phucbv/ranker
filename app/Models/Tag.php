<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'slug'
    ];

    public function setTagAttribute() {
        return ucwords($this->attributes['tag']);
    }

    public function getSlugAttribute() {
        return str_slug($this->attributes['tag']);
    }

    /*
     * The tag that belong to many posts
     */
    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }
}
