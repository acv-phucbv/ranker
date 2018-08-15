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
        'category', 'slug', 'description'
    ];

    public function setCategoryAttribute($value) {
        $this->attributes['category'] = ucwords($value);
    }

    public function setDescriptionAttribute($value) {
         $this->attributes['description'] = ucwords($value);
    }

    /*
     * The category has many posts
     */
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
