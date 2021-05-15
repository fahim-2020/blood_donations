<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smoking extends Model
{
    protected $table = 'smoking';
    
    protected $fillable = array('name');
}
