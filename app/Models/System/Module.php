<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $guarded = ['id'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
