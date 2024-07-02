<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg, $name, $email;

    public function __construct($subject, $msg, $name, $email)
    {
        $this->subject = $subject;
        $this->msg = $msg;
        $this->name = $name;
        $this->email = $email;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
            from: new Address($this->email,  $this->name),
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.enquiry',
        );
    }

    public function attachments()
    {
        return [];
    }
}
