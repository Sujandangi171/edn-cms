<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class UserPassword extends Model
{
    public $timestamps = true;
    public $guarded = ['id'];
}
