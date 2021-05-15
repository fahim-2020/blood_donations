<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = 'setting';
    
    protected $fillable = array('email','logo_lg','logo_sm','mobile','address');
}
