<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\Traits\Filterable;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Filterable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'username', 'email', 'password', 'firstname', 'lastname', 'describe'
    ];

    protected $appends = ['fullname'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute() {
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }

    protected static $filterable = [
        'username', 'fulname', 'email'
    ];

    /**
     * @const role
     */
    const ROLE_ADMIN = 1;
    const ROLE_AUTHOR = 2;

    /**
     * Get avaiable roles
     *
     * @return array
     */
    public static function roles()
    {
        return [
            self::ROLE_ADMIN => trans('auth.role_admin'),
            self::ROLE_AUTHOR => trans('auth.role_author'),
        ];
    }

    /**
     * set user password
     *
     * @param string $avalue
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            if (\Hash::needsRehash($value)) {
                $this->attributes['password'] = \Hash::make($value);
            } else {
                $this->attributes['password'] = $value;
            }
        }
    }

    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isEdit()
    {
        return $this->role == self::ROLE_ADMIN || $this->role == self::ROLE_AUTHOR;
    }

    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }

    /*
     * The user has many posts
     */
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    /*
     * The user has many comments
     */
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
