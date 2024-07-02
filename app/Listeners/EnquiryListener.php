<?php

namespace App\Listeners;

use App\Mail\EnquiryMail;
use App\Events\EnquiryEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnquiryListener implements ShouldQueue
{
    use Queueable;

    public function handle(EnquiryEvent $enquiry)
    {
        $email = $enquiry->data->email;
        $subject = $enquiry->data->subject;
        $message = $enquiry->data->message;
        $name = $enquiry->data->name;


        try {
            Mail::to('hr.endeavornepal@gmail.com')->send(new EnquiryMail($subject, $message, $name, $email));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
