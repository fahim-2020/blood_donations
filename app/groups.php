<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    protected $table = 'groups';

    protected $fillable = array('name', 'image');
}
