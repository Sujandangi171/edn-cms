<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $username, $password, $link;

    public function __construct($name, $username, $password, $link)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->link = $link;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome to' . getConfig('company-name') . '-Your Login Information.',
            from: new Address(getConfig('email'), getConfig('company-name')),
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.passwordSetup',
        );
    }

    public function attachments()
    {
        return [];
    }
}
