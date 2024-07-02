<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Vacancy extends Model
{
    use HasFactory, LogsActivity;

    public $timestamps = true;
    public $guarded = ['id'];
    protected static $logName = 'Vacancy';
    protected $table = 'vacancies';
    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(self::$logName)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function vacancyType()
    {
        return $this->belongsTo(VacancyType::class, 'vacancy_type_id');
    }

    public function scopeRank($query)
    {
        return $query->orderBy('rank', 'ASC');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
