<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function modules()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
