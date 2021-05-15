<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blood_req extends Model
{
    protected $table = 'blood_req';
    
    protected $fillable = [
        'name', 'email','gender','city','group','age','mobile','unit','date','hospital','disease','your_name'
    ];



    public function genders()
    {
        return $this->belongsTo('App\genders', 'gender', 'id');
    }

    public function groups()
    {
        return $this->belongsTo('App\groups', 'group', 'id');
    }

     public function citys()
    {
        return $this->belongsTo('App\city', 'city', 'id');
    }
}
