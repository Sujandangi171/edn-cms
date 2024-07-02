<?php

namespace App\Mail;

use App\Http\Traits\MailTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToApplicant extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, MailTrait;

    public $name, $jobTitle;

    public function __construct($name, $jobTitle)
    {
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }
    public function build()
    {
        if ($this->jobTitle) {
            $data = $this->emailTemplate([
                '%first_name%' => $this->name,
                '%job_title%' => $this->jobTitle,
                '%company_name%' => getConfig('company-name')
            ], 'EmailForApplicant');
        } else {
            $data = $this->emailTemplate([
                '%first_name%' => $this->name,
                '%company_name%' => getConfig('company-name')
            ], 'EmailForInterestedApplicant');
        }

        $this->subject($data['subject']);
        $this->from($data['from']);

        return $this->view('mail.applicant', ['content' => $data['content']]);
    }
}
