<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable, Messagable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    function jobs() {
        return $this->hasMany('App\Job');
    }

    function role() {
        return $this->belongsTo('App\Role');
    }
    
    function profile() {
        return $this->hasOne('App\Profile', 'id', 'user_id');
    }

    function skills() {
        return $this->belongsToMany('App\Skill')->withTimeStamps();
    }

    function educations() {
        return $this->hasMany('App\Education');
    }

    function works() {
        return $this->hasMany('App\Work');
    }

    function applicant() {
        return $this->hasOne('App\Applicant', 'id', 'user_id');
    }
}
