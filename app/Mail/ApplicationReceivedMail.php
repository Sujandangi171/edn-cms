<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationReceivedMail extends Mailable implements ShouldQueue
{
    use  Queueable, SerializesModels;

    public  $jobTitle, $link;

    public function __construct($jobTitle, $link,)
    {
        $this->jobTitle = $jobTitle;
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
            view: 'mail.newApplication',
        );
    }

    public function attachments()
    {
        return [];
    }
}
