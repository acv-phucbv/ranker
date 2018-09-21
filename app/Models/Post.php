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
        'title', 'slug', 'content', 'status', 'category_id', 'auth_id', 'feature_image'
    ];

    protected static $filterable = ['title'];

    public function setTitleAttribute($value) {
        $this->attributes['title'] = ucwords($value);
    }

    /*
     * The post that belong to the user
     */
    public function author() {
        return $this->belongsTo('App\Models\User', 'auth_id');
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
        return $this->belongsToMany('App\Models\Tag', 'posts_tags');
    }
}
