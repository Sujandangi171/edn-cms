<?php

namespace App\Providers;

use App\Events\EnquiryEvent;
use App\Events\VacancyEvent;
use App\Events\SetPasswordEvent;
use App\Events\ResetPasswordEvent;
use App\Listeners\EnquiryListener;
use App\Listeners\VacancyListener;
use App\Listeners\SetPasswordListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ResetPasswordListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SetPasswordEvent::class => [
            SetPasswordListener::class
        ],

        ResetPasswordEvent::class => [
            ResetPasswordListener::class
        ],

        VacancyEvent::class => [
            VacancyListener::class
        ],

        EnquiryEvent::class => [
            EnquiryListener::class
        ]
    ];

    public function boot()
    {
        //
    }
}
