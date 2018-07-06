<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\Traits\Filterable;

class Post extends Model
{
    use Notifiable, SoftDeletes, Filterable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'status', 'category_id', 'auth_id', 'tags_id'
    ];

    protected static $filterable = ['title'];

    public function setTitleAttribute() {
        return ucwords($this->attributes['title']);
    }

    public function getSlugAttribute() {
        return str_slug($this->attributes['title']);
    }

    /*
     * The post that belong to the user
     */
    public function author() {
        return $this->belongsTo('App\Models\User');
    }

    /*
     * The post that belong to the category
     */
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    /*
     * The post has many tags
     */
    public function tags() {
        return $this->hasMany('App\Models\Tag');
    }
}
