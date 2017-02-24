<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public $fillable = ['name', 'email', 'password', 'is_admin' ];
}

