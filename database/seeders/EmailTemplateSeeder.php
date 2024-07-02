<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\System\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    protected $model;

    public function __construct(EmailTemplate $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $contentTypes = [
            [
                'subject' => 'Thank you for applying.',
                'from' => 'hr.endeavornepal@gmail.com',
                'title' => 'Email For Applicant',
                'code' => 'EmailForApplicant',
                'content' => '<p>Dear %first_name%,</p><p>This is a confirmation that we have received your application for the post of the job post of %job_title%.&nbsp;</p><p>Thank you for your application, and have a nice day.<br>Best Regards<br>%company_name%</p>',
                'rank' => 1,
                'status' => true
            ],
            [
                'subject' => 'Application Received.',
                'from' => 'hr.endeavornepal@gmail.com',
                'title' => 'Email For Interested Applicant',
                'code' => 'EmailForInterestedApplicant',
                'content' => '<p>Dear %first_name%,</p><p>This is a confirmation that we have received your application. We will notify you when there is a job available sutiable for you. &nbsp;</p><p>Thank you for your application, and have a nice day.<br>Best Regards<br>%company_name%</p>',
                'rank' => 1,
                'status' => true
            ],

        ];

        foreach ($contentTypes as $type) {
            $this->model->updateOrInsert(
                ['code' => $type['code']],
                [
                    'subject' => $type['subject'] ?? null,
                    'from' => $type['from'] ?? null,
                    'title' => $type['title'] ?? null,
                    'code' => $type['code'] ?? null,
                    'content' => $type['content'] ?? null,
                    'status' => $type['status'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
