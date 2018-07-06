<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'slug'
    ];

    public function setCategoryAttribute() {
        return ucwords($this->attributes['category']);
    }

    public function getSlugAttribute() {
        return str_slug($this->attributes['category']);
    }

    /*
     * The category has many posts
     */
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
