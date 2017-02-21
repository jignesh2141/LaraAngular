<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = array('id', 'name', 'project_id', 'order');
}
