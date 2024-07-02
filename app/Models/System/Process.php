<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Process extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    public $guarded = ['id'];
    protected static $logName = 'Process';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(self::$logName)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeRank($query)
    {
        return $query->orderBy('rank', 'ASC');
    }
}
