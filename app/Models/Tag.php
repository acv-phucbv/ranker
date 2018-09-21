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
        'name', 'slug', 'description'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = ucwords($value);
    }

    /*
     * The tag that belong to many posts
     */
    public function posts() {
        return $this->belongsToMany('App\Models\Post', 'posts_tags');
    }
}
