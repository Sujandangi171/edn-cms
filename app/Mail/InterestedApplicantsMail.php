<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterestedApplicantsMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $jobTitle, $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Job Application Received.',
            from: new Address(getConfig('email'), getConfig('company-name')),
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.interestedApplicantMail',
        );
    }

    public function attachments()
    {
        return [];
    }
}
