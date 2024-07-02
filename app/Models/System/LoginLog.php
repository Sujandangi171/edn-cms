<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = ['id'];

    public $casts = [
        'location' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
