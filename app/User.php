<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender_id','city_id','addicted_id','smoking_id','group_id','dob','age', 'weight','mobile','image','last_don',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','user_type'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function gender()
    {
        return $this->belongsTo('App\genders');
    }

    public function group()
    {
        return $this->belongsTo(groups::class);
    }

     public function city()
    {
        return $this->belongsTo(city::class);
    }
     public function addicted()
    {
        return $this->belongsTo(addicted::class);
    }
     public function smoking()
    {
        return $this->belongsTo(smoking::class);
    }
     
}
