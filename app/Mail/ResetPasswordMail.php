<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $name, $link;

    public function __construct($email, $name, $link)
    {
        $this->email = $email;
        $this->name = $name;
        $this->link = $link;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Reset Password Mail',
            from: new Address(getConfig('email'), getConfig('company-name')),
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.resetPasswordSetup',
        );
    }

    public function attachments()
    {
        return [];
    }
}
