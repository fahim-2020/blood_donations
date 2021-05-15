<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genders extends Model
{
    protected $table = 'genders';

    protected $fillable = array('name');
}
