<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Applicant extends Model
{
    use HasFactory, LogsActivity;

    public $timestamps = true;
    public $guarded = ['id'];

    public $casts = [
        'title' => 'array'
    ];

    protected static $logName = 'Applicant';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(self::$logName)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function universityName()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(State::class, 'province_id', 'code');
    }

    public function district()
    {
        return $this->belongsTo(State::class, 'district_id', 'code');
    }

    public function municipality()
    {
        return $this->belongsTo(State::class, 'municipality_id', 'code');
    }
}
