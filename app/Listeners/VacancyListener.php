<?php

namespace App\Listeners;

use App\Events\VacancyEvent;
use App\Mail\ApplicationReceivedMail;
use App\Mail\MailToApplicant;
use Illuminate\Support\Facades\Mail;

class VacancyListener
{
    public function handle(VacancyEvent $event)
    {
        $name = $event->data->first_name;
        $email = $event->data->email;
        $vacancyDetail = $event->data->vacancy;
        $link = env('APP_URL') . 'system/applicants/' . $event->data->id;

        try {
            //For Company
            Mail::to(getConfig('email'))->send(new ApplicationReceivedMail($vacancyDetail->title ?? null, $link));
            //For Applicant
            Mail::to($email)->send(new MailToApplicant($name, $vacancyDetail->title ?? null));
        } catch (\Exception $e) {
            return false;
        }
    }
}
