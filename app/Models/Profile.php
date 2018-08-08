<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\Traits\Filterable;

class Profile extends Model
{
    use Notifiable, SoftDeletes, Filterable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

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
        'user_id', 'firstname', 'lastname', 'avatar', 'birthday', 'describe'
    ];

    public function getFullnameAttribute() {
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }

    protected static $filterable = [
        'username', 'email'
    ];

    /*
     * The profile belongTo user
     */
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
